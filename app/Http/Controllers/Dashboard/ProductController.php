<?php

namespace App\Http\Controllers\Dashboard;

use App\Stage;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $stages = Stage::all();

        $products = Product::when($request->search, function ($q) use ($request) {

            return $q->whereTranslationLike('name', '%' . $request->search . '%');

        })->when($request->stage_id, function ($q) use ($request) {

            return $q->where('stage_id', $request->stage_id);

        })->latest()->paginate(5);

        return view('dashboard.products.index', compact('stages', 'products'));

    }//end of index

    public function create()
    {
        $stages = Stage::all();
        return view('dashboard.products.create', compact('stages'));

    }//end of create

    public function store(Request $request)
    {
        $rules = [
            'stage_id' => 'required'
        ];

        foreach (config('translatable.locales') as $locale) {

            $rules += [$locale . '.name' => 'required|unique:product_translations,name'];
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
                ->save(public_path('uploads/product_images/' . $request->image->hashName()));

            $request_data['image'] = $request->image->hashName();

        }//end of if

        Product::create($request_data);
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.products.index');

    }//end of store

    public function edit(Product $product)
    {
        $stages = Stage::all();
        return view('dashboard.products.edit', compact('stages', 'product'));

    }//end of edit

    public function update(Request $request, Product $product)
    {
        $rules = [
            'stage_id' => 'required'
        ];

        foreach (config('translatable.locales') as $locale) {

            $rules += [$locale . '.name' => ['required', Rule::unique('product_translations', 'name')->ignore($product->id, 'product_id')]];
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

            if ($product->image != 'default.png') {

                Storage::disk('public_uploads')->delete('/product_images/' . $product->image);
                    
            }//end of if

            Image::make($request->image)
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/product_images/' . $request->image->hashName()));

            $request_data['image'] = $request->image->hashName();

        }//end of if
        
        $product->update($request_data);
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.products.index');

    }//end of update

    public function destroy(Product $product)
    {
        if ($product->image != 'default.png') {

            Storage::disk('public_uploads')->delete('/product_images/' . $product->image);

        }//end of if

        $product->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.products.index');

    }//end of destroy

}//end of controller
