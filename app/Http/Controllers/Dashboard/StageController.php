<?php

namespace App\Http\Controllers\Dashboard;

use App\Stage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class stageController extends Controller
{
    public function index(Request $request)
    {
        $stages = Stage::when($request->search, function ($q) use ($request) {

            return $q->whereTranslationLike('name', '%' . $request->search . '%');

        })->latest()->paginate(5);

        return view('dashboard.stages.index', compact('stages'));

    }//end of index

    public function create()
    {
        return view('dashboard.stages.create');

    }//end of create

    public function store(Request $request)
    {
        $rules = [];

        foreach (config('translatable.locales') as $locale) {

            $rules += [$locale . '.name' => ['required', Rule::unique('stage_translations', 'name')]];

        }//end of for each

        $request->validate($rules);

        Stage::create($request->all());
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.stages.index');

    }//end of store

    public function edit(stage $stage)
    {
        return view('dashboard.stages.edit', compact('stage'));

    }//end of edit

    public function update(Request $request, stage $stage)
    {
        $rules = [];

        foreach (config('translatable.locales') as $locale) {

            $rules += [$locale . '.name' => ['required', Rule::unique('stage_translations', 'name')->ignore($stage->id, 'stage_id')]];

        }//end of for each

        $request->validate($rules);

        $stage->update($request->all());
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.stages.index');

    }//end of update

    public function destroy(stage $stage)
    {
        $stage->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.stages.index');

    }//end of destroy

}//end of controller
