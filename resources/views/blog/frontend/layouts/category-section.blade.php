@php
    $categories = \App\Models\Category::where('is_active','1')->get();
@endphp
<div class="aside-widget">
    <div class="section-title">
        <h2 class="title">Categories</h2>
    </div>
    <div class="category-widget">
        <ul>
        @foreach ($categories as $category)
            <li><a href="{{ route('blogs.category',$category->uuid) }}">{{ $category->name }} <span>{{ count($category->blogs->where('is_active','1')) }}</span></a></li>
        @endforeach
        </ul>
    </div>
</div>