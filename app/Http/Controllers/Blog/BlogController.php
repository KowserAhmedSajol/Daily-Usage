<?php

namespace App\Http\Controllers\Blog;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Blog;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function index()
    {
        $categories = Category::where('is_active','1')->get();
        $categoryIds = Category::where('is_active','1')->pluck('id');
        $subCategories = SubCategory::where('is_active','1')->get();
        $blogs = Blog::whereIn('category_id',$categoryIds)->orderBy('created_at','DESC')->where('is_active','1')->select('category_id','title','slug','image','serial','is_active','created_by','created_at')->get();
        $latestBlog = $blogs;
        $blogsMain = $blogs->random(3);
        $count = count($categories);
        ($count >= 3 ? $categoriesSection = $categories->random(3) :$categoriesSection = $categories->random($count));

        foreach($categoriesSection as $cats)
        {
            $randomBlogs = $blogs->where('category_id',$cats->id);
            $cnt = count($randomBlogs);
            ($cnt >=3 ? $randomBlogs = $randomBlogs->random(3) :$randomBlogs = $randomBlogs->random($cnt));
            $cats->attachedBlogs = $randomBlogs;
        }
        ($count >= 3 ? $categoriesInlineSection = $categories->random(3) :$categoriesInlineSection = $categories->random($count));
        
        foreach($categoriesInlineSection as $catsInline)
        {
            $randomInlineBlogs = $blogs->where('category_id',$catsInline->id);
            $cont = count($randomInlineBlogs);
            ($cont >=1 ? $randomInlineBlogs = $randomInlineBlogs->random(1) :$randomInlineBlogs = $randomInlineBlogs->random($cont));
            // dd($categoriesSection);
            $catsInline->randomInlineBlogs = $randomInlineBlogs;
        }
        
        $count = count($blogs);
        ($count >=9 ? $blogsSection = $blogs->random(9) : $blogsSection = $blogs->random($count));
        

        
        return view('blog.frontend.index',
                    compact(
                            'categories',
                            'subCategories',
                            'blogs',
                            'blogsMain',
                            'categoriesSection',
                            'blogsSection',
                            'categoriesInlineSection',
                            'latestBlog'
                            )
                );
    }
    public function create()
    {
        $categories = Category::where('is_active','1')->get();
        $subCategories = SubCategory::where('is_active','1')->get();
        $tags = Tag::where('is_active','1')->get();
        return view('blog.backend.create',compact('categories','subCategories','tags'));
    }
    public function store(Request $request)
    {
       
        if ($request->hasFile('image')) {
            $fileNameWithExtension = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
            $request->file('image')->storeAs('public/blog/images', $fileNameToStore); 
        } else {
            $fileNameToStore = null; 
        }

        $blog = Blog::create([
            'uuid' => Str::uuid(),
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id ?? 0,
            'title' => $request->title,
            'slug' => Str::slug($request->title, '_'),
            'serial' => 1,
            'image' => $fileNameToStore,
            'description' => $request->description,
            'created_by' => Auth::id(),
        ]);
        foreach ($request->tags as $key => $tag) {
            $blog_tag = DB::table('blog_tag')->insert([
                'blog_id' => $blog->id,
                'tag_id' => $tag,
            ]);
        }
        return redirect()->route('blogs.list')->withSuccess('Blog Post has been Created successfully!');
        // return view('blog.backend.create',compact('categories','subCategories'));
    }
    public function list()
    {
        $blogs = Blog::all();
        return view('blog.backend.list',compact(
            'blogs',
            ));
    }
    public function category($uuid)
    {
        $category = Category::where('uuid',$uuid)->where('is_active','1')->first();
        return view('blog.frontend.category',compact(
            'category',
            ));
    }

    public function blogPost($slug)
    {
        
        $blog = Blog::where('slug',$slug)->where('is_active','1')->first();
        if($blog != null)
        {
            $category = Category::where('id',$blog->category_id)->first();
            if($category->is_active == 0)
            {
                $blog = null;
            }else{
                $blog->total_visit = $blog->total_visit+1;
                $blog->update();
            }
            $previousBlog = Blog::where('is_active','1')->where('id', '<', $blog->id)->orderBy('id', 'desc')->first(); 
            $nextBlog = Blog::where('is_active','1')->where('id', '>', $blog->id)->orderBy('id')->first();
        }
        return view('blog.frontend.blog-post',compact(
            'blog',
            'previousBlog',
            'nextBlog',
            ));
        // dd($slug);
    }
    public function toggleStatus($uuid)
    {
        $blog = Blog::where('uuid',$uuid)->first();
        if ($blog->is_active == 1) {
            $blog->is_active = 0;
            $blog->update();
        }elseif($blog->is_active == 0)
        {
            $blog->is_active = 1;
            $blog->update();   
        }
        
        return redirect()->route('blogs.list')->withSuccess('Blog Status has been Updated successfully!');

    }


}
