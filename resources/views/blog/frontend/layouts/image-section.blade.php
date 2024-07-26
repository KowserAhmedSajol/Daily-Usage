@php
    $blogs = \App\Models\Blog::where('is_active','1')->select('category_id','slug','image','is_active')->get();
    $count = count($blogs);
    ($count >=6 ? $blogsImageSection = $blogs->random(6) : $blogsImageSection = $blogs->random($count));
@endphp
<div class="aside-widget">
    <div class="section-title">
    <h2 class="title">More</h2>
    </div>
    <div class="galery-widget">
    <ul>
      @foreach ($blogsImageSection as $blog)
        <li><a href="{{ route('blogs.blogPost',$blog->slug) }}"><img style="height:116px;" src="{{ asset('storage/blog/images') }}/{{ $blog->image }}" alt></a></li>
      @endforeach
    </ul>
    </div>
    </div>