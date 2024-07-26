<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Category: {{ $category->name ?? 'This Category Is currently Not Available' }}</title>

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CMuli:400,700" rel="stylesheet">

    <link type="text/css" rel="stylesheet" href="{{ asset('blog') }}/css/bootstrap.min.css" />

    <link rel="stylesheet" href="{{ asset('blog') }}/css/font-awesome.min.css">

    <link type="text/css" rel="stylesheet" href="{{ asset('blog') }}/css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
      integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
  </head>

  <body>


    @include('blog.frontend.layouts.header')
    <input type="hidden" id="category_id" value="{{ $category->id }}">
    <div class="page-header">
      <div class="page-header-bg"
        style="background-image: url('{{ asset('storage/blog/category/images') }}/{{ $category->image ?? '' }}'); background-repeat: no-repeat;background-size: 100% 550px;"
        data-stellar-background-ratio="0.5"></div>
      <div class="container">
        <div class="row">
          <div class="col-md-offset-1 col-md-10 text-center">
            <h1 class="text-uppercase">{{ $category->name ?? 'Not Available' }}</h1>
          </div>
        </div>
      </div>
    </div>
    <div class="section">

      <div class="container">

        <div class="row">
          <div class="col-md-8">
            @if ($category != null)

            @if (count($category->blogs->where('is_active','1'))>0)

            @foreach ($category->blogs->where('is_active','1')->random('1') as $index => $blog)
            <div class="post post-thumb">
              <a class="post-img" href="{{ route('blogs.blogPost',$blog->slug) }}"><img
                  src="{{ asset('storage/blog/images') }}/{{ $blog->image }}" style="height:420px;" alt></a>
              <div class="post-body">
                <div class="post-category">
                  <a href="{{ route('blogs.category',$category->uuid) }}">{{ $blog->category->name }}</a>
                </div>
                <h3 class="post-title title-lg"><a
                    href="{{ route('blogs.blogPost',$blog->slug) }}">{{ $blog->title }}</a></h3>
                <ul class="post-meta">
                  <li><a href="author.html">{{ $blog->creator->name }}</a></li>
                  <li>{{ $blog->created_at->format('d-M-Y') }}</li>
                </ul>
              </div>
            </div>
            @endforeach
            @endif
            <div class="row">
              @if (count($category->blogs->where('is_active','1'))>0)
              @php
              if(count($category->blogs->where('is_active','1'))>5)
              {
              $value = 5;
              }else{
              $value = count($category->blogs->where('is_active','1'));
              }
              @endphp
              @foreach ($category->blogs->where('is_active','1')->random($value) as $index => $blog)
              @if ($index != 0)
              <div class="col-md-6">
                <div class="post">
                  <a class="post-img" href="{{ route('blogs.blogPost',$blog->slug) }}"><img
                      src="{{ asset('storage/blog/images') }}/{{ $blog->image }}" style="height:200px;" alt></a>
                  <div class="post-body">
                    <div class="post-category">
                      <a href="{{ route('blogs.category',$category->uuid) }}">{{ $blog->category->name }}</a>
                    </div>
                    <h3 class="post-title"><a href="{{ route('blogs.blogPost',$blog->slug) }}">{{ $blog->title }}</a>
                    </h3>
                    <ul class="post-meta">
                      <li><a href="author.html">{{ $blog->creator->name }}</a></li>
                      <li>{{ $blog->created_at->format('d-M-Y') }}</li>
                    </ul>
                  </div>
                </div>
              </div>
              @if ($index == 2)
              <div class="clearfix visible-md visible-lg"></div>
              @endif
              @if ($index == 4)
              @break
              @endif
              @endif
              @endforeach
              @else
              <div class="col-md-12">
                <div class="post">
                  No Post
                </div>
              </div>
              @endif

            </div>
            @endif


            <div class="row">
              <div class="col-md-12" id="post_lists">

              </div>
            </div>


            <div class="section-row loadmore text-center">
              <a id="load-more-btn" style="cursor:pointer;" class="primary-button">Load More</a>
            </div>
          </div>
          <div class="col-md-4">

            <div class="aside-widget text-center">
              <a href="#" style="display: inline-block;margin: auto;">
                <img class="img-responsive" src="{{ asset('blog') }}/img/ad-3.jpg" alt>
              </a>
            </div>


            <div class="aside-widget">
              <div class="section-title">
                <h2 class="title">Social Media</h2>
              </div>
              <div class="social-widget">
                <ul>
                  <li>
                    <a href="#" class="social-facebook">
                      <i class="fa fa-facebook"></i>
                      <span>21.2K<br>Followers</span>
                    </a>
                  </li>
                  <li>
                    <a href="#" class="social-twitter">
                      <i class="fa fa-twitter"></i>
                      <span>10.2K<br>Followers</span>
                    </a>
                  </li>
                  <li>
                    <a href="#" class="social-google-plus">
                      <i class="fa fa-google-plus"></i>
                      <span>5K<br>Followers</span>
                    </a>
                  </li>
                </ul>
              </div>
            </div>



            @include('blog.frontend.layouts.category-section')
            @include('blog.frontend.layouts.newsletter')
            @include('blog.frontend.layouts.popular-posts')
            @include('blog.frontend.layouts.image-section')


            <div class="aside-widget text-center">
              <a href="#" style="display: inline-block;margin: auto;">
                <img class="img-responsive" src="{{ asset('blog') }}/img/ad-1.jpg" alt>
              </a>
            </div>

          </div>
        </div>

      </div>

    </div>



    @include('blog.frontend.layouts.footer')


    <script src="{{ asset('blog') }}/js/jquery.min.js"></script>
    <script src="{{ asset('blog') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('blog') }}/js/jquery.stellar.min.js"></script>
    <script src="{{ asset('blog') }}/js/main.js"></script>

    <script>
      $(document).ready(function() {
    loadBlog();
    $(document).on('click','#load-more-btn', loadBlog); 
    
});
  function loadBlog()
{
  
  $('#load-more-btn').html('Loading...');
  var blogIds = [];
  var blogIdInputs = document.querySelectorAll('input[name="blog_id"]');  
  blogIdInputs.forEach(function(input) {
      blogIds.push(input.value);
  });
  let data = {};
  data.category_id  = $('#category_id').val();
  data.blogIds  = blogIds;
  console.log('data');

  $.ajax({
      url      : `/api/blogs/load-blogs-categorized`,
      method   : "GET",
      data     : data,
      dataType : "JSON",
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success     : function (data)
      {
        console.log(data);
        
        $.each(data.data, function(key, value) {
          let date = new Date(value.created_at);
          
          // Define month names
          const months = ["JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL", "AUG", "SEP", "OCT", "NOV", "DEC"];
          
          // Format the date
          let formattedDate = date.getDate() + '-' + months[date.getMonth()] + '-' + date.getFullYear();
          var url = '{{ route("blogs.blogPost", ":id") }}';
          url = url.replace(':id', value.slug);
        console.log(value);
        $('#post_lists').append(
          `
          <div class="post post-row">
          <input type="hidden" name="blog_id" value="${value.id}">
          <a class="post-img" href="${url}"><img src="{{ asset('storage/blog/images') }}/${value.image}" style="height:170px;" alt></a>
          <div class="post-body">
          <div class="post-category">
          <a href="">${value.category.name}</a>
          </div>
          <h3 class="post-title"><a href="${url}">${value.title}</a></h3>
          <ul class="post-meta">
          <li><a href="author.html">${value.creator.name}</a></li>
          <li>${formattedDate}</li>
          </ul>
          </div>
          </div>
          `
        );
        });
        if (data.endofBlog == 'end') {
          $('#load-more-btn').html('All Blogs Loaded');
          document.getElementById('load-more-btn').style.visibility="hidden";
        } else {
          $('#load-more-btn').html('Load More');
        }
      },
      error(err){
          console.log('error')

      }
  });
}
    </script>
  </body>

</html>