<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('blog.backend.categories.index',compact(
            'categories',
            ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blog.backend.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $ipAddress = $request->ip();
        if ($request->hasFile('image')) {
            $fileNameWithExtension = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
            $request->file('image')->storeAs('public/blog/category/images', $fileNameToStore); // Change the storage path as needed
        } else {
            $fileNameToStore = null; // Default image if no image is uploaded
        }
        // setTitleAttribute($request->name);
        $category = Category::create([
            'uuid' => Str::uuid(),
            'name' => $request->name,
            'slug' => Str::slug($request->name, '_'),
            // 'slug' => str_slug($request->slug , "_"),
            'serial' => 1,
            'image' => $fileNameToStore,
        ]);
        return redirect()->route('categories.index')->withSuccess('Category has been Created successfully!');
    }

    // private function setTitleAttribute($value)
    // {
    //     $this->attributes['title'] = $value;
    //     $this->attributes['slug'] = str_slug($value);
    // }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($uuid)
    {
        $category = Category::where('uuid',$uuid)->first();
        $category->delete();
        return redirect()->route('categories.index')->withSuccess('Category has been Destroyed successfully!');
    }

    public function toggleStatus($uuid)
    {
        $category = Category::where('uuid',$uuid)->first();
        if ($category->is_active == 1) {
            $category->is_active = 0;
            $category->update();
        }elseif($category->is_active == 0)
        {
            $category->is_active = 1;
            $category->update();   
        }
        
        return redirect()->route('categories.index')->withSuccess('Category Status has been Updated successfully!');

    }
}
