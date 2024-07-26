@php
    // $popularPostsCategories = \App\Models\Category::where('is_active','1')->get();
    // $popularPosts = $popularPostsCategories->blogs->where('is_active','1')->pluck('id');
    // dd($popularPosts);
    
    $popularCategoryIds = \App\Models\Category::where('is_active','1')->pluck('id');
    $popularBlogs = \App\Models\Blog::whereIn('category_id',$popularCategoryIds)
                            ->orderBy('total_visit','DESC')
                            ->where('is_active','1')
                            ->select('category_id','title','slug','image','serial','is_active','created_by','created_at','total_visit')
                            ->take(12)
                            ->get();
    // dd($blogs);
@endphp

<div class="aside-widget">
    <div class="section-title">
    <h2 class="title">Popular Posts</h2>
    </div>
    @foreach ($popularBlogs as $blog)
    <div class="post post-widget">
    <a class="post-img" href="{{ route('blogs.blogPost',$blog->slug) }}"><img src="{{ asset('storage/blog/images') }}/{{ $blog->image }}" style="height:80px;" alt></a>
    <div class="post-body">
    <div class="post-category">
    <a href="{{ route('blogs.category',$blog->category->uuid) }}">{{ $blog->category->name }} ({{ $blog->total_visit}})</a>
    </div>
    <h3 class="post-title"><a href="{{ route('blogs.blogPost',$blog->slug) }}">{{ implode(' ', array_slice(explode(' ', $blog->title), 0, 9)) }}</a></h3>
    </div>
    </div>
    @endforeach
    
</div>