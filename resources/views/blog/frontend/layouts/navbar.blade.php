@php
    $headerCategories = \App\Models\Category::where('is_active','1')->get();
@endphp
<div id="nav-bottom">
    <div class="container">
    
    <ul class="nav-menu">
        
    <li><a href="{{ route('blogs.index') }}">Home</a></li>
    {{-- <li class="has-dropdown">
    <a href="index.html">Home</a>
    <div class="dropdown">
    <div class="dropdown-body">
    <ul class="dropdown-list">
    <li><a href="category.html">Category page</a></li>
    <li><a href="blog-post.html">Post page</a></li>
    <li><a href="author.html">Author page</a></li>
    <li><a href="about.html">About Us</a></li>
    <li><a href="contact.html">Contacts</a></li>
    <li><a href="blank.html">Regular</a></li>
    </ul>
    </div>
    </div>
    </li> --}}
    <li class="has-dropdown megamenu">
    <a href="#">Categories</a>
    <div class="dropdown tab-dropdown">
    <div class="row">
    <div class="col-md-2">
    <ul class="tab-nav">
    {{-- <li class="active"><a data-toggle="tab" href="#tab1">Lifestyle</a></li>
    <li><a data-toggle="tab" href="#tab2">Fashion</a></li>
    <li><a data-toggle="tab" href="#tab1">Health</a></li>
    <li><a data-toggle="tab" href="#tab2">Travel</a></li> --}}
    
    @foreach ($headerCategories as $index=>$category)
    @php
        if ($index == 0)
        {
            $active = 'active';
        }else{
            $active = '';
        }
    @endphp
    <li class="{{ $active }}"><a data-toggle="tab" href="#tab{{ $category->id }}">{{ $category->name }}</a></li>
    @endforeach

    </ul>
    </div>
    <div class="col-md-10">
    <div class="dropdown-body tab-content">
        
    @foreach ($headerCategories as $index=>$category)
    @php
        if ($index == 0)
        {
            $active = 'active';
        }else{
            $active = '';
        }
    @endphp
        <div id="tab{{ $category->id }}" class="tab-pane fade in {{ $active }}">
            
            <div class="row">
                @php
                    if(count($category->blogs)>3)
                    {
                        $value = 3;
                    }else{
                        $value = count($category->blogs);
                    }
                @endphp
                @foreach ($category->blogs->random($value) as $index=>$blog)  
                <div class="col-md-4">
                    <div class="post post-sm">
                        <a class="post-img" href="{{ route('blogs.blogPost',$blog->slug) }}"><img src="{{ asset('storage/blog/images') }}/{{ $blog->image }}" style="height:150px;" alt></a>
                        <div class="post-body">
                            <div class="post-category">
                            <a href="{{ route('blogs.category',$category->uuid) }}">{{ $blog->category->name }}</a>
                            </div>
                            <h3 class="post-title title-sm"><a href="{{ route('blogs.blogPost',$blog->slug) }}">{{ $blog->title }}</a></h3>
                            <ul class="post-meta">
                            <li><a href="author.html">{{ $blog->creator->name }}</a></li>
                            <li>{{ $blog->created_at->format('d-M-Y') }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
                @if ($index == 2)
                    @break
                @endif
                @endforeach
            </div>
        </div>
    @endforeach
    </div>
    </div>
    </div>
    </div>
    </li>

    @foreach ($headerCategories as $category)
    <li><a href="{{ route('blogs.category',$category->uuid) }}">{{ $category->name }}</a></li>
    @endforeach
    
    <li><a href="{{ route('blogs.about-us') }}">About Us</a></li>
    <li><a href="{{ route('blogs.contuct-us') }}">Contuct Us</a></li>
    </ul>
    
    </div>
    </div>