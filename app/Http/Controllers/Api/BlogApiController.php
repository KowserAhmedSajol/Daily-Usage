<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Profile;
use App\Models\SubCategory;
use App\Models\Category;
use App\Models\Blog;

class BlogApiController extends Controller
{
    public function getSubCategory(Request $request)
    {
        $subCategories = SubCategory::where('category_id',$request->category_id)->get();
        // dd($subCategories);
        return response()->json([
            "msg" =>  'Successfull',
            "data" =>  $subCategories,
        ], 200);
    }
    public function loadBlogs(Request $request)
    {
        if($request->blogIds)
        {
            $excludedBlogIds = $request->blogIds;
        }else
        {
            $excludedBlogIds = array("0");
        }
        $categoryIds = Category::where('is_active','1')->pluck('id');
        

        $blogs = Blog::whereIn('category_id', $categoryIds)
                ->whereNotIn('id', $excludedBlogIds)
                ->with('category', 'tags', 'creator')
                ->orderBy('created_at', 'DESC')
                ->where('is_active', '1')
                ->select('id', 'category_id', 'title', 'slug', 'image', 'serial', 'is_active', 'created_by', 'created_at')
                ->get();
        if(count($blogs)<5)
        {
            $blogs = $blogs->random(count($blogs));
            $endofBlog = 'end';
        }else{
            $blogs = $blogs->random(5);
            $endofBlog = '';
        }
                
        return response()->json([
            "msg" =>  'Successfull',
            "data" =>  $blogs,
            "endofBlog" =>  $endofBlog,
        ], 200);
    }
    public function loadBlogsCategorized(Request $request)
    {
        if($request->blogIds)
        {
            $excludedBlogIds = $request->blogIds;
        }else
        {
            $excludedBlogIds = array("0");
        }
        $blogs = Blog::where('category_id',$request->category_id)
        ->whereNotIn('id', $excludedBlogIds)
        ->with('category','tags','creator')
        ->orderBy('created_at','DESC')
        ->where('is_active','1')
        ->select('id','category_id','title','slug','image','serial','is_active','created_by','created_at')
        ->get();
        if(count($blogs)>=10)
        {
            $blogs = $blogs->random('10');
            $endofBlog = '';
        }else
        {
            $blogs = $blogs->random(count($blogs));
            $endofBlog = 'end';
        }
        return response()->json([
            "msg" =>  'Successfull',
            "data" =>  $blogs,
            "endofBlog" =>  $endofBlog,
        ], 200);
    }
    public function loadBlogsTagged(Request $request)
    {
        // Initialize the excluded blog IDs
        $excludedBlogIds = $request->blogIds ? $request->blogIds : array("0");
    
        // Retrieve blogs associated with the given tag_id, excluding specified blogs
        $blogs = Blog::whereHas('tags', function ($query) use ($request) {
                $query->where('blog_tag.tag_id', $request->tag_id);
            })
            ->whereNotIn('id', $excludedBlogIds)
            ->with('category', 'tags', 'creator')
            ->orderBy('created_at', 'DESC')
            ->where('is_active', '1')
            ->select('id', 'category_id', 'title', 'slug', 'image', 'serial', 'is_active', 'created_by', 'created_at')
            ->get();
    
        // Determine the number of blogs to return
        if (count($blogs) >= 10) {
            $blogs = $blogs->random(10);
            $endofBlog = '';
        } else {
            $blogs = $blogs->random(count($blogs));
            $endofBlog = 'end';
        }
    
        // Return the response as JSON
        return response()->json([
            "msg" => 'Successful',
            "data" => $blogs,
            "endofBlog" => $endofBlog,
        ], 200);
    }
    


}
