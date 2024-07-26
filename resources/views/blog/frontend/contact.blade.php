<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Callie HTML Template</title>

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

    <div class="page-header">
      <div class="container">
        <div class="row">
          <div class="col-md-offset-1 col-md-10 text-center">
            <h1 class="text-uppercase">Contacts</h1>
            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
              ut labore et dolore magna aliqua.</p>
          </div>
        </div>
      </div>
    </div>

    <div class="section">

      <div class="container">

        <div class="row">
          <div class="col-md-8">
            <div class="section-row">
              <div class="section-title">
                <h2 class="title">Contact Information</h2>
              </div>
              <p>Malis debet quo et, eam an lorem quaestio. Mea ex quod facer decore, eu nam mazim postea. Eu deleniti
                pertinacia ius. Ad elitr latine eam, ius sanctus eleifend no, cu primis graecis comprehensam eum. Ne vim
                prompta consectetuer, etiam signiferumque ea eum.</p>
              <ul class="contact">
                <li><i class="fa fa-phone"></i> +88 01988858108</li>
                <li><i class="fa fa-envelope"></i> <a href="#">kowsersojol@gmail.com</a></li>
                <li><i class="fa fa-map-marker"></i> Narayanganj,Dhaka,Bangladesh</li>
              </ul>
            </div>
            <div class="section-row">
              <div class="section-title">
                <h2 class="title">Mail us</h2>
              </div>
              <form action="{{ route('blogs.contuct-us-form-get') }}" method="post">
                @csrf
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <input class="input" type="email" name="email" placeholder="Email">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <input class="input" type="text" name="subject" placeholder="Subject">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <textarea class="input" name="message" placeholder="Message"></textarea>
                    </div>
                    <button class="primary-button">Submit</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="col-md-4">

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


            <div class="aside-widget">
              <div class="section-title">
                <h2 class="title">Newsletter</h2>
              </div>
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

      </div>

    </div>



    @include('blog.frontend.layouts.footer')


    <script src="{{ asset('blog') }}/js/jquery.min.js"></script>
    <script src="{{ asset('blog') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('blog') }}/js/jquery.stellar.min.js"></script>
    <script src="{{ asset('blog') }}/js/main.js"></script>

  </body>

</html>