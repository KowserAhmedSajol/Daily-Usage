<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\StoreSubCategoryRequest;
use App\Http\Requests\UpdateSubCategoryRequest;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subCategories = SubCategory::all();
        return view('blog.backend.sub-categories.index',compact('subCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('blog.backend.sub-categories.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        if ($request->hasFile('image')) {
            $fileNameWithExtension = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
            $request->file('image')->storeAs('public/blog/sub-category/images', $fileNameToStore); // Change the storage path as needed
        } else {
            $fileNameToStore = null; // Default image if no image is uploaded
        }

        $subCategory = SubCategory::create([
            'uuid' => Str::uuid(),
            'category_id' => $request->category_id,
            'name' => $request->name,
            'slug' => $request->slug,
            'serial' => 1,
            'image' => $fileNameToStore,
        ]);
        return redirect()->route('sub-categories.index')->withSuccess('Sub Category has been Created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubCategory $subCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubCategoryRequest $request, SubCategory $subCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($uuid)
    {
        $subCategory = SubCategory::where('uuid',$uuid)->first();
        if ($subCategory) {
            $subCategory->delete();
        }
        return redirect()->route('sub-categories.index')->withSuccess('Sub Category has been Destroyed successfully!');
    }

    public function toggleStatus($uuid)
    {
        $subCategory = SubCategory::where('uuid',$uuid)->first();
        if ($subCategory->is_active == 1) {
            $subCategory->is_active = 0;
            $subCategory->update();
        }elseif($subCategory->is_active == 0)
        {
            $subCategory->is_active = 1;
            $subCategory->update();   
        }
        
        return redirect()->route('sub-categories.index')->withSuccess('Sub Category Status has been Updated successfully!');

    }
}
