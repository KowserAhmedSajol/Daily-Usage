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
    <button class="search-btn"><i class="fa fa-search"></i></button>
    <div id="nav-search">
    <form>
    <input class="input" name="search" placeholder="Enter your search...">
    </form>
    <button class="nav-close search-close">
    <span></span>
    </button>
    </div>
    </div>
    
    </div>
    </div>
    
    

    @include('blog.frontend.layouts.navbar')
    
    
    <div id="nav-aside">
    <ul class="nav-aside-menu">
    <li><a href="index.html">Home</a></li>
    <li class="has-dropdown"><a>Categories</a>
    <ul class="dropdown">
    <li><a href="#">Lifestyle</a></li>
    <li><a href="#">Fashion</a></li>
    <li><a href="#">Technology</a></li>
    <li><a href="#">Travel</a></li>
    <li><a href="#">Health</a></li>
    </ul>
    </li>
    <li><a href="about.html">About Us</a></li>
    <li><a href="contact.html">Contacts</a></li>
    <li><a href="#">Advertise</a></li>
    </ul>
    <button class="nav-close nav-aside-close"><span></span></button>
    </div>
    
    </div>
    
    </header>