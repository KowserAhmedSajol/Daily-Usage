<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Blog Page: Home</title>

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CMuli:400,700" rel="stylesheet">

    <link type="text/css" rel="stylesheet" href="{{ asset('blog') }}/css/bootstrap.min.css" />

    <link rel="stylesheet" href="{{ asset('blog') }}/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="css/font-awesome.min.css"> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
      integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link type="text/css" rel="stylesheet" href="{{ asset('blog') }}/css/style.css" />
    <style>
      .clamp-text {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 2;
        overflow: hidden;
        text-overflow: ellipsis;
        line-height: 1.5em;
        /* Adjust based on your font size */
        max-height: 3em;
        /* line-height * number of lines to show */
      }
    </style>

    {{-- [if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif] --}}
  </head>

  <body>


    @include('blog.frontend.layouts.header')


    <div class="section">

      <div class="container">

        <div id="hot-post" class="row hot-post">
          <div class="col-md-8 hot-post-left">
            <div class="post post-thumb">
              <a class="post-img" href="{{ route('blogs.blogPost',$blogsMain[0]->slug) }}"><img
                  src="{{ asset('storage/blog/images') }}/{{ $blogsMain[0]->image }}" style="height:450px;"
                  alt="{{ $blogsMain[0]->title }}"></a>
              <div class="post-body">
                <div class="post-category">
                  <a
                    href="{{ route('blogs.category',$blogsMain[0]->category->uuid) }}">{{ $blogsMain[0]->category->name }}</a>
                </div>
                <h3 class="post-title title-lg"><a class="clamp-text"
                    href="{{ route('blogs.blogPost',$blogsMain[0]->slug) }}">{{ $blogsMain[0]->title }}</a></h3>
                <ul class="post-meta">
                  <li><a href="author.html">{{ $blogsMain[0]->creator->name }}</a></li>
                  <li>{{ $blogsMain[0]->created_at->format('d-M-Y') }}</li>
                </ul>
              </div>
            </div>

          </div>


          <div class="col-md-4 hot-post-right">
            @foreach ($blogsMain as $index=>$blog)
            @if ($index!= 0 )

            <div class="post post-thumb">
              <a class="post-img" href="{{ route('blogs.blogPost',$blog->slug) }}"><img
                  src="{{ asset('storage/blog/images') }}/{{ $blog->image }}" style="height:222px;"
                  alt="{{ $blog->title }}"></a>
              <div class="post-body">
                <div class="post-category">
                  <a href="{{ route('blogs.category',$blog->category->uuid) }}">{{ $blog->category->name }}</a>
                </div>
                <h3 class="post-title"><a class="clamp-text"
                    href="{{ route('blogs.blogPost',$blog->slug) }}">{{ $blog->title }}</a></h3>
                <ul class="post-meta">
                  <li><a href="author.html">{{ $blog->creator->name }}</a></li>
                  <li>{{ $blog->created_at->format('d-M-Y') }}</li>
                </ul>
              </div>
            </div>
            @endif
            @endforeach

          </div>
        </div>

      </div>

    </div>


    <div class="section">

      <div class="container">

        <div class="row">

          <div class="col-md-8">

            <div class="row">

              <div class="col-md-12">
                <div class="section-title">
                  <h2 class="title">Recent posts</h2>
                </div>
              </div>


              @foreach ($latestBlog as $key => $blog)

              <div class="col-md-6">
                <div class="post">
                  <a class="post-img" href="{{ route('blogs.blogPost',$blog->slug) }}"><img
                      src="{{ asset('storage/blog/images') }}/{{ $blog->image }}" style="height:240px;"
                      alt="{{ $blog->title }}"></a>
                  <div class="post-body">
                    <div class="post-category">
                      <a href="{{ route('blogs.category',$blog->category->uuid) }}">{{ $blog->category->name }}</a>
                    </div>
                    <h3 class="post-title"><a class="clamp-text"
                        href="{{ route('blogs.blogPost',$blog->slug) }}">{{ $blog->title }}</a></h3>
                    <ul class="post-meta">
                      <li><a href="author.html">{{ $blog->creator->name }}</a></li>
                      <li>{{ $blog->created_at->format('d-M-Y') }}</li>
                    </ul>
                  </div>
                </div>
              </div>
              @if ($key == 1)
              <div class="clearfix visible-md visible-lg"></div>
              @endif
              @if ($key == 3)
              @break
              @endif
              @endforeach
              <div class="col-md-12 section-row text-center">
                <a href="#" style="display: inline-block;margin: auto;">
                  <img class="img-responsive" src="{{ asset('blog') }}/img/ad-2.jpg" alt>
                </a>
              </div>
            </div>

            @foreach ($categoriesSection as $category)
            <div class="row">
              @if (count($category->attachedBlogs) >0)
              <div class="col-md-12">
                <div class="section-title">
                  <h2 class="title">{{ $category->name }}</h2>
                </div>
              </div>

              @endif
              @foreach ($category->attachedBlogs as $blog)
              <div class="col-md-4">
                <div class="post post-sm">
                  <a class="post-img" href="{{ route('blogs.blogPost',$blog->slug) }}"><img
                      src="{{ asset('storage/blog/images') }}/{{ $blog->image }}" style="height:150px;"
                      alt="{{ $blog->title }}"></a>
                  <div class="post-body">
                    <div class="post-category">
                      <a href="{{ route('blogs.category',$blog->category->uuid) }}">{{ $blog->category->name }}</a>
                    </div>
                    <h3 class="post-title title-sm"><a class="clamp-text"
                        href="{{ route('blogs.blogPost',$blog->slug) }}">{{ $blog->title }}</a></h3>
                    <ul class="post-meta">
                      <li> </li>
                      <li>{{ $blog->created_at->format('d-M-Y') }}</li>
                    </ul>
                  </div>
                </div>
              </div>
              @endforeach
              <div class="col-md-12 section-row text-center">
                <a href="#" style="display: inline-block;margin: auto;">
                  <img class="img-responsive" src="{{ asset('blog') }}/img/ad-2.jpg" alt>
                </a>
              </div>
            </div>
            @endforeach




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

          </div>
        </div>

      </div>

    </div>


    <div class="section">

      <div class="container">

        <div class="row">

        </div>

      </div>

    </div>


    <div class="section">

      <div class="container">

        <div class="row">

          @foreach ($categoriesInlineSection as $category)

          <div class="col-md-4">
            <div class="section-title">
              <h2 class="title">{{ $category->name }}</h2>
            </div>
            @foreach ($category->randomInlineBlogs as $blog)
            <div class="post">
              <a class="post-img" href="{{ route('blogs.blogPost',$blog->slug) }}"><img
                  src="{{ asset('storage/blog/images') }}/{{ $blog->image }}" style="height:200px;"
                  alt="{{ $blog->title }}"></a>
              <div class="post-body">
                <div class="post-category">
                  <a href="{{ route('blogs.category',$blog->category->uuid) }}">{{ $blog->category->name }}</a>
                </div>
                <h3 class="post-title"><a class="clamp-text"
                    href="{{ route('blogs.blogPost',$blog->slug) }}">{{ implode(' ', array_slice(explode(' ', $blog->title), 0, 15)) }}</a>
                </h3>
                <ul class="post-meta">
                  <li><a href="author.html">{{ $blog->creator->name }}</a></li>
                  <li>{{ $blog->created_at->format('d-M-Y') }}</li>
                </ul>
              </div>
            </div>
            @endforeach

          </div>
          @endforeach
          <div class="col-md-12 section-row text-center">
            <a href="#" style="display: inline-block;margin: auto;">
              <img class="img-responsive" src="{{ asset('blog') }}/img/ad-2.jpg" alt>
            </a>
          </div>
        </div>


        <div class="row">
          @foreach ($blogsSection as $blog)
          <div class="col-md-4">
            <div class="post post-widget" style="height:100px;">
              <a class="post-img" href="{{ route('blogs.blogPost',$blog->slug) }}"><img style="height:70px;"
                  src="{{ asset('storage/blog/images') }}/{{ $blog->image }}" alt="{{ $blog->title }}"></a>
              <div class="post-body">
                <div class="post-category">
                  <a href="{{ route('blogs.category',$blog->category->uuid) }}">{{ $blog->category->name }}</a>
                </div>
                <h3 class="post-title"><a
                    href="{{ route('blogs.blogPost',$blog->slug) }}">{{ implode(' ', array_slice(explode(' ', $blog->title), 0, 9)) }}</a>
                </h3>
              </div>
            </div>
          </div>
          @endforeach
          <div class="col-md-12 section-row text-center">
            <a href="#" style="display: inline-block;margin: auto;">
              <img class="img-responsive" src="{{ asset('blog') }}/img/ad-2.jpg" alt>
            </a>
          </div>

        </div>

      </div>

    </div>


    <div class="section">

      <div class="container">

        <div class="row">
          <div class="col-md-8">
            <div class="row">
              <div class="col-md-12" id="post_lists">

              </div>
            </div>


            <div class="section-row loadmore text-center">
              <a id="load-more-btn" style="cursor:pointer;" class="primary-button">Load More</a>
            </div>
          </div>
          <div class="col-md-4">

            <input type="hidden" value="">
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
    var blogIds = [];
    var blogIdInputs = document.querySelectorAll('input[name="blog_id"]');
    
    blogIdInputs.forEach(function(input) {
        blogIds.push(input.value);
    });
    console.log(blogIds);
		let data = {};
		data.hello  = 'hello';
		data.blogIds  = blogIds;
    $('#load-more-btn').html('Loading...');
		$.ajax({
        url      : `/api/blogs/load-blogs`,
        method   : "GET",
        data     : data,
        dataType : "JSON",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success  : function (data)
        {
          $.each(data.data, function(key, value) {
            let date = new Date(value.created_at);
            const months = ["JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL", "AUG", "SEP", "OCT", "NOV", "DEC"];
            let formattedDate = date.getDate() + '-' + months[date.getMonth()] + '-' + date.getFullYear();
            var url = '{{ route("blogs.blogPost", ":id") }}';
            url = url.replace(':id', value.slug);
            $('#post_lists').append(
              `
              <div class="post post-row">
              <input type="hidden" name="blog_id" value="${value.id}">
              <a class="post-img" href="${url}"><img src="{{ asset('storage/blog/images') }}/${value.image}" style="height:170px;" alt="${value.title}"></a>
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