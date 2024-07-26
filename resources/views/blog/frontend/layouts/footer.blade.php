<footer id="footer">

    <div class="container">
    
    <div class="row">
    <div class="col-md-3">
    <div class="footer-widget">
    <div class="footer-logo">
    <a href="index.html" class="logo"><img src="{{ asset('blog') }}/img/logo/footer-logo.png" style="height:80px;width:260px;" alt></a>
    </div>
    <p>Nec feugiat nisl pretium fusce id velit ut tortor pretium. Nisl purus in mollis nunc sed. Nunc non blandit massa enim nec.</p>
    <ul class="contact-social">
    <li><a href="#" class="social-facebook"><i class="fa fa-facebook"></i></a></li>
    <li><a href="#" class="social-twitter"><i class="fa fa-twitter"></i></a></li>
    <li><a href="#" class="social-google-plus"><i class="fa fa-google-plus"></i></a></li>
    <li><a href="#" class="social-instagram"><i class="fa fa-instagram"></i></a></li>
    </ul>
    </div>
    </div>
    <div class="col-md-3">
    @php
        $footerCategories = \App\Models\Category::where('is_active','1')->get();
        $footerTags = \App\Models\Tag::where('is_active','1')->get();
    @endphp
    <div class="footer-widget">
    <h3 class="footer-title">Categories</h3>
    <div class="category-widget">
    <ul>
    @foreach ($footerCategories as $category)
        <li><a href="{{ route('blogs.category',$category->uuid) }}">{{ $category->name }} <span>{{ count($category->blogs->where('is_active','1')) }}</span></a></li>
    @endforeach
    </ul>
    </div>
    </div>
    </div>
    <div class="col-md-3">
    <div class="footer-widget">
    <h3 class="footer-title">Tags</h3>
    <div class="tags-widget">
    <ul>
    @foreach ($footerTags as $tag)
        <li><a href="#">{{ $tag->title }}</a></li>
    @endforeach
    {{-- <li><a href="#">Lifestyle</a></li>
    <li><a href="#">Blog</a></li>
    <li><a href="#">Travel</a></li>
    <li><a href="#">Technology</a></li>
    <li><a href="#">Fashion</a></li>
    <li><a href="#">Life</a></li>
    <li><a href="#">News</a></li>
    <li><a href="#">Magazine</a></li>
    <li><a href="#">Food</a></li>
    <li><a href="#">Health</a></li> --}}
    </ul>
    </div>
    </div>
    </div>
    <div class="col-md-3">
    <div class="footer-widget">
    <h3 class="footer-title">Newsletter</h3>
    <div class="newsletter-widget">
    <form>
    <p>Nec feugiat nisl pretium fusce id velit ut tortor pretium.</p>
    <input class="input" name="newsletter" placeholder="Enter Your Email">
    <button class="primary-button">Subscribe</button>
    </form>
    </div>
    </div>
    </div>
    </div>
    
    
    <div class="footer-bottom row">
    <div class="col-md-6 col-md-push-6">
    <ul class="footer-nav">
    <li><a href="{{ route('blogs.index') }}">Home</a></li>
    <li><a href="about.html">About Us</a></li>
    <li><a href="contact.html">Contacts</a></li>
    <li><a href="#">Advertise</a></li>
    <li><a href="#">Privacy</a></li>
    </ul>
    </div>
    <div class="col-md-6 col-md-pull-6">
    <div class="footer-copyright">
    
    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="" target="_blank">Sojol</a>
    
    </div>
    </div>
    </div>
    
    </div>
    
    </footer>