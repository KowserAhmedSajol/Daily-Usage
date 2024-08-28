<header id="header">

    <div id="nav">
    
    <div id="nav-top">
    <div class="container">
    
    <ul class="nav-social">
    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
    </ul>
    
    
    <div class="nav-logo">
    <a href="{{ route('blogs.index') }}" class="logo"><img src="{{ asset('blog') }}/img/logo/header-logo.png" style="height:70px; width:250px;" alt></a>
    </div>
    
    
    <div class="nav-btns">
    <button class="aside-btn"><i class="fa fa-bars"></i></button>
    <a href="{{ route('login') }}" class="search-btn"><i class="fa fa-user-circle"></i></a>
    {{-- <div id="nav-search">
    <form>
    <input class="input" name="search" placeholder="Enter your search...">
    </form>
    <button class="nav-close search-close">
    <span></span>
    </button>
    </div> --}}
    </div>
    
    </div>
    </div>
    
    

    @include('blog.frontend.layouts.navbar')
    
    
    <div id="nav-aside">
    <ul class="nav-aside-menu">
    <li><a href="{{ route('blogs.index') }}">Home</a></li>
    <li class="has-dropdown"><a>Categories</a>
    @php
    $headerSideCategories = \App\Models\Category::where('is_active','1')->get();
    @endphp
    <ul class="dropdown">
        @foreach ($headerSideCategories as $index=>$category)
        <li><a href="{{ route('blogs.category',$category->uuid) }}">{{ $category->name }}</a></li>
        @endforeach
    </ul>
    </li>
    <li><a href="{{ route('blogs.about-us') }}">About Us</a></li>
    <li><a href="{{ route('blogs.contuct-us') }}">Contacts</a></li>
    <li><a href="#">Advertise</a></li>
    </ul>
    <button class="nav-close nav-aside-close"><span></span></button>
    </div>
    
    </div>
    
    </header>