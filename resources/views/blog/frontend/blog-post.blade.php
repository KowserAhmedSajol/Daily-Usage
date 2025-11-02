<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="{{ asset('icon.png') }}" type="image/gif">
    <title>{{ $blog->title ?? 'This Post is currently Not Avaailable' }}</title>

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CMuli:400,700" rel="stylesheet">

    <link type="text/css" rel="stylesheet" href="{{ asset('blog') }}/css/bootstrap.min.css" />

    <link rel="stylesheet" href="{{ asset('blog') }}/css/font-awesome.min.css">

    <link type="text/css" rel="stylesheet" href="{{ asset('blog') }}/css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
      integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
      .descrption img {
        width: 100% !important;
      }
    </style>
  </head>
{{-- @dd() --}}
  <body>
    @include('blog.frontend.layouts.header')
    <a id="scrollButton"></a>
    @if ($blog != null)
    @php
      $commentBlog = $blog
    @endphp
    <input type="hidden" value="{{ $blog->id }}" id="blog_id">
    <div id="post-header" class="page-header">
      <div class="page-header-bg"
        style="background-image: url('{{ asset('storage/blog/category/images') }}/{{ $blog->category->image ?? '' }}'); background-repeat: no-repeat;background-size: 100% 550px;"
        data-stellar-background-ratio="0.5"></div>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="post-category">
              <a href="category.html">{{ $blog->category->name ?? ''}}</a>
            </div>
            <h1>{{ $blog->title ?? '' }}</h1>
            <ul class="post-meta">
              <li><a href="author.html">{{ $blog->creator->name  ?? ''}}</a></li>
              <li>{{ $blog->created_at->format('d-M-Y') ?? '' }}</li>
              <li><i class="fa fa-comments"></i> 3</li>
              <li><i class="fa fa-eye"></i> {{ $blog->total_visit  ?? 0 }}</li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="section">

      <div class="container">

        <div class="row">
          <div class="col-md-8">

            <div class="section-row">
              <div class="post-share">
                <a href="#" class="social-facebook"><i class="fa fa-facebook"></i><span>Share</span></a>
                <a href="#" class="social-twitter"><i class="fa fa-twitter"></i><span>Tweet</span></a>
                <a href="#" class="social-pinterest"><i class="fa fa-pinterest"></i><span>Pin</span></a>
                <a href="#"><i class="fa fa-envelope"></i><span>Email</span></a>
              </div>
            </div>


            <div class="section-row descrption">
              <img src="{{ asset('storage/blog/images') }}/{{ $blog->image ?? '' }}" style="width:100%;" alt="">
              <p>{!! $blog->description ?? '' !!}</p>


            </div>


            <div class="section-row">
              <div class="post-tags">
                <ul>
                  <li>TAGS:</li>
                  {{-- @dd($blog->tags) --}}
                  @if (count($blog->tags)>0)
                  @foreach ($blog->tags as $tag)
                  @if ($tag->tag->is_active == 1)
                  <li><a href="{{ route('blogs.tags',$tag->tag->uuid) }}">{{ $tag->tag->title }}</a></li>
                  @endif
                  @endforeach
                  @else
                  <li><a href="#">No Tag</a></li>
                  @endif
                </ul>
              </div>
            </div>


            <div class="section-row">
              <div class="post-nav">
                <div class="prev-post">
                  @if ($previousBlog)
                  <a class="post-img" href="{{ route('blogs.blogPost',$previousBlog->slug) }}"><img
                      src="{{ asset('storage/blog/images') }}/{{ $previousBlog->image ?? '' }}"
                      alt="{{ $previousBlog->title ?? '' }}" style="height:60px;"></a>
                  <h3 class="post-title"><a
                      href="{{ route('blogs.blogPost',$previousBlog->slug) }}">{{ implode(' ', array_slice(explode(' ', $previousBlog->title), 0, 12)) }}</a>
                  </h3>
                  <span>Previous post</span>
                  @endif
                </div>
                <div class="next-post">
                  @if ($nextBlog)
                  <a class="post-img" href="{{ route('blogs.blogPost',$nextBlog->slug) }}"><img
                      src="{{ asset('storage/blog/images') }}/{{ $nextBlog->image ?? '' }}"
                      alt="{{ $nextBlog->title ?? '' }}" style="height:60px;"></a>
                  <h3 class="post-title"><a
                      href="{{ route('blogs.blogPost',$nextBlog->slug) }}">{{ implode(' ', array_slice(explode(' ', $nextBlog->title), 0, 12)) }}</a>
                  </h3>
                  <span>Next post</span>
                  @endif
                </div>
              </div>
            </div>
            <div>
              <div class="section-title">
                <h3 class="title">Related Posts</h3>
              </div>
              <div class="row">
                @php
                if (count($blog->category->blogs)>=3) {
                $relatedPost = $blog->category->blogs->random('3');
                }else{
                $relatedPost = $blog->category->blogs->random(count($blog->category->blogs));
                }
                @endphp
                @foreach ($relatedPost as $index=>$blog)
                <div class="col-md-4">
                  <div class="post post-sm">
                    <a class="post-img" href="{{ route('blogs.blogPost',$blog->slug) }}"><img
                        src="{{ asset('storage/blog/images') }}/{{ $blog->image }}" style="height:140px;" alt></a>
                    <div class="post-body">
                      <div class="post-category">
                        <a href="{{ route('blogs.category',$blog->category->uuid) }}">{{ $blog->category->name }}</a>
                      </div>
                      <h3 class="post-title title-sm"><a
                          href="{{ route('blogs.blogPost',$blog->slug) }}">{{ implode(' ', array_slice(explode(' ', $blog->title), 0, 15)) }}</a>
                      </h3>
                      <ul class="post-meta">
                        <li><a href="author.html">{{ $blog->creator->name }}</a></li>
                        <li>{{ $blog->created_at->format('d-M-Y') }}</li>
                      </ul>
                    </div>
                  </div>
                </div>
                @php
                if($index == 2)
                {
                break;
                }
                @endphp
                @endforeach


              </div>
            </div>


            <div class="section-row">
              <div class="section-title">
                <h3 class="title">{{ count($commentBlog->comments->where('parent_id', '0')) }} Comments</h3>
              </div>
              <div class="post-comments">
                @foreach ($commentBlog->comments->where('parent_id', '0') as $comment)
                <div class="media">
                  <div class="media-left">
                    <img class="media-object" src="{{ asset('storage/profile/images') }}/{{ $comment->user->image }}" style="height:50px;width:50px;" alt>
                  </div>
                  <div class="media-body">
                    <div class="media-heading">
                      <h4>{{ $comment->user->name }}</h4>
                      <span class="time">{{ $comment->created_at->diffForHumans(); }}</span>
                    </div>
                    <p>{{ $comment->comment }}</p>
                    <input type="hidden" class="parent_id" value="{{ $comment->id }}">
                    <a style="cursor:pointer;" data-parent_id="{{ $comment->id }}" class="reply">Reply</a>
                    {{-- @dd($comment->replies) --}}
                    @if (count($comment->replies)>0)
                    <div style="margin-top:3px;" class="rep" data-parent_id="{{ $comment->id }}">

                      @foreach ($comment->replies as $replies)
                      <div class="media media-author">
                        <div class="media-left">
                          <img class="media-object" src="{{ asset('storage/profile/images') }}/{{ $comment->user->image }}" style="height:50px;width:50px;" alt>
                        </div>
                        <div class="media-body">
                          <div class="media-heading">
                            <h4>{{ $replies->user->name }}</h4>
                            <span class="time">{{ $replies->created_at->diffForHumans(); }}</span>
                          </div>
                          <p>{{ $replies->comment }}</p>
                          <a style="cursor: pointer;" data-parent_id="{{ $comment->id }}" class="reply">Reply</a>
                        </div>
                      </div>
                      @endforeach
                    </div>
                    @endif

                  </div>
                </div>
                @endforeach
              </div>
            </div>


            <div class="section-row">
              <div class="section-title">
                <h3 class="title">Leave a reply</h3>
              </div>
              <input type="hidden" id="user_id" value="{{ auth()->user()->id ?? 0 }}">
              <input type="hidden" id="parent_id" value="0">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <textarea id="comment" class="input" name="comment" placeholder="comment"></textarea>
                  </div>
                </div>
                <div class="col-md-12">
                  <button id="comment_submit" data-parent_id="0" class="primary-button">Submit</button>
                </div>
              </div>
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

    @else
    <div id="post-header" class="page-header">
      <div class="page-header-bg"
        style="background-image: url('{{ asset('storage/blog/images') }}/{{ $blog->image ?? '' }}');"
        data-stellar-background-ratio="0.5"></div>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1 style="text-align:center;">{{ $blog->title ?? 'Unavailable' }}</h1>

          </div>
        </div>
      </div>
    </div>

    <div class="section">

      <div class="container">

        <div class="row">
          <div class="col-md-8">


            <div class="section-row">
              <p>{{ $blog->description ?? '' }}</p>
              <p style="text-align:center; font-size:20px;"><b>This post is currently Unavailable</b></p>


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






            <div class="aside-widget text-center">
              <a href="#" style="display: inline-block;margin: auto;">
                <img class="img-responsive" src="{{ asset('blog') }}/img/ad-1.jpg" alt>
              </a>
            </div>

          </div>
        </div>

      </div>

    </div>
    @endif

    @include('blog.frontend.layouts.footer')


    <script src="{{ asset('blog') }}/js/jquery.min.js"></script>
    <script src="{{ asset('blog') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('blog') }}/js/jquery.stellar.min.js"></script>
    <script src="{{ asset('blog') }}/js/main.js"></script>
    <script>
      var btn = $('#scrollButton');
      $(window).scroll(function() {
      if ($(window).scrollTop() > 300) {
        btn.addClass('show');
      } else {
        btn.removeClass('show');
      }
      });
      btn.on('click', function(e) {
      e.preventDefault();
      $('html, body').animate({scrollTop:0}, '300');
      });
    </script>
    <script>
      $(document).ready(function() {
        $(document).on('click','.reply_submit', addComment);
        $(document).on('click','#comment_submit', addComment);
        $('.reply').on('click', function() {
          console.log('reply');
            var replySection = `
                <div class="section-row removable" style="margin-top:5px;">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea id="comment" class="input" name="comment" placeholder="comment"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button id="reply_submit" data-parent_id="${$(this).data('parent_id')}" class="primary-button reply_submit">Submit</button>
                        </div>
                    </div>
                </div>
            `;

            $(this).after(replySection);
        });
      });
      function addComment()
      {
        let data = {};
        data.comment  = $('#comment').val();
        data.user_id  = $('#user_id').val();
        data.blog_id  = $('#blog_id').val();
        data.parent_id  = $(this).data('parent_id');
        console.log(data);
        if(data.user_id == 0 ){
          $('#comment_submit').html('You Must Log In Before Making A Comment');
          return false;
        }
        if(data.comment == '' ){
          $('#comment_submit').html('Comment Can not Be Empty');
          return false;
        }
        apiCall(data);
      }
      function apiCall(data)
      {
        $.ajax({
            url      : `/api/blogs/add-comment`,
            method   : "GET",
            data     : data,
            dataType : "JSON",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success     : function (data)
            {
              $('#comment').val('');
              if(data.placement == 'main')
              {
                var newComment = `
                <div class="media">
                  <div class="media-left">
                    <img class="media-object" src="${data.comment.user.image}" style="height:50px;width:50px;" alt>
                  </div>
                  <div class="media-body">
                    <div class="media-heading">
                      <h4>${data.comment.user.name}</h4>
                      <span class="time">${data.comment.created_at}</span>
                    </div>
                    <p>${data.comment.comment}</p>
                    <input type="hidden" value="${data.comment.id}">
                    <a style="cursor:pointer;" data-parent_id="${data.comment.parent_id}" class="reply">Reply</a>
                  </div>
                </div>
              `;
              $('.post-comments').append(newComment);
              }else if(data.placement == 'sub')
              {
                console.log(data.comment.parent_id);
                var parentElement = $(`.rep[data-parent_id="${data.comment.parent_id}"]`);
                console.log(parentElement);
                var newComment = `
                <div class="media media-author">
                  <div class="media-left">
                    <img class="media-object" src="${data.comment.user.image}" style="height:50px;width:50px;" alt>
                  </div>
                  <div class="media-body">
                    <div class="media-heading">
                      <h4>${data.comment.user.name}</h4>
                      <span class="time">${data.comment.created_at}</span>
                    </div>
                    <p>${data.comment.comment}</p>
                    <a style="cursor: pointer;" data-parent_id="${data.comment.parent_id}" class="reply">Reply</a>
                  </div>
                </div>
              `;
              $('.removable').hide();
              parentElement.append(newComment);
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
