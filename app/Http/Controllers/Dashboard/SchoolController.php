<?php

namespace App\Http\Controllers\Dashboard;

use App\Stage;
use App\School;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;

class SchoolController extends Controller
{
    public function index(Request $request)
    {
        $stages = Stage::all();

        $schools = school::when($request->search, function ($q) use ($request) {

            return $q->whereTranslationLike('name', '%' . $request->search . '%');

        })->when($request->stage_id, function ($q) use ($request) {

            return $q->where('stage_id', $request->stage_id);

        })->latest()->paginate(5);

        return view('dashboard.schools.index', compact('stages', 'schools'));

    }//end of index

    public function create()
    {
        $stages = Stage::all();
        return view('dashboard.schools.create', compact('stages'));

    }//end of create

    public function store(Request $request)
    {
        $rules = [
            'stage_id' => 'required'
        ];

        foreach (config('translatable.locales') as $locale) {

            $rules += [$locale . '.name' => 'required|unique:school_translations,name'];
            $rules += [$locale . '.description' => 'required'];

        }//end of  for each

        $rules += [
            'purchase_price' => 'required',
            'sale_price' => 'required',
            'stock' => 'required',
        ];

        $request->validate($rules);

        $request_data = $request->all();

        if ($request->image) {

            Image::make($request->image)
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/school_images/' . $request->image->hashName()));

            $request_data['image'] = $request->image->hashName();

        }//end of if

        School::create($request_data);
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.schools.index');

    }//end of store

    public function edit(school $school)
    {
        $stages = Stage::all();
        return view('dashboard.schools.edit', compact('stages', 'school'));

    }//end of edit

    public function update(Request $request, school $school)
    {
        $rules = [
            'stage_id' => 'required'
        ];

        foreach (config('translatable.locales') as $locale) {

            $rules += [$locale . '.name' => ['required', Rule::unique('school_translations', 'name')->ignore($school->id, 'school_id')]];
            $rules += [$locale . '.description' => 'required'];

        }//end of  for each

        $rules += [
            'purchase_price' => 'required',
            'sale_price' => 'required',
            'stock' => 'required',
        ];

        $request->validate($rules);

        $request_data = $request->all();

        if ($request->image) {

            if ($school->image != 'default.png') {

                Storage::disk('public_uploads')->delete('/school_images/' . $school->image);
                    
            }//end of if

            Image::make($request->image)
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/school_images/' . $request->image->hashName()));

            $request_data['image'] = $request->image->hashName();

        }//end of if
        
        $school->update($request_data);
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.schools.index');

    }//end of update

    public function destroy(school $school)
    {
        if ($school->image != 'default.png') {

            Storage::disk('public_uploads')->delete('/school_images/' . $school->image);

        }//end of if

        $school->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.schools.index');

    }//end of destroy

}//end of controller
