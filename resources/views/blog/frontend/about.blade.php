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

  </head>

  <body>

    @include('blog.frontend.layouts.header')
    <div class="page-header">
      <div class="container">
        <div class="row">
          <div class="col-md-offset-1 col-md-10 text-center">
            <h1 class="text-uppercase">About Us</h1>
            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
              ut labore et dolore magna aliqua.</p>
          </div>
        </div>
      </div>
    </div>


    <div class="section">

      <div class="container">

        <div class="row">
          <div class="col-md-5">
            <div class="section-row">
              <div class="section-title">
                <h2 class="title">Our story</h2>
              </div>
              <p>Lorem ipsum dolor sit amet, mea ad idque detraxit, cu soleat graecis invenire eam. Vidisse suscipit
                liberavisse has ex, vocibus patrioque vim et, sed ex tation reprehendunt. Mollis volumus no vix, ut qui
                clita habemus, ipsum senserit est et. Ut has soluta epicurei mediocrem, nibh nostrum his cu, sea clita
                electram reformidans an.</p>
              <blockquote class="blockquote">
                <p>Ei prima graecis consulatu vix, per cu corpora qualisque voluptaria. Bonorum moderatius in per, ius
                  cu albucius voluptatum. Ne ius torquatos dissentiunt. Brute illum utroque eu quo. Cu tota
                  mediocritatem vis, aliquip cotidieque eu ius, cu lorem suscipit eleifend sit.</p>
                <footer class="blockquote-footer">John Doe</footer>
              </blockquote>
            </div>
          </div>
          <div class="col-md-7">
            <div class="section-row">
              <div class="section-title">
                <h2 class="title">Our Vision</h2>
              </div>
              <p>Est in saepe accusam luptatum. Purto deleniti philojknjksophia eum ea, impetus copiosae id mel. Vis at
                ignota delenit democritum, te summo tamquam delicata pro. Utinam concludaturque et vim, mei ullum
                intellegam ei. Eam te illum nostrud, suas sonet corrumpit ea per. Ut sea regione posidonium. Pertinax
                gubergren ne qui, eos an harum mundi quaestio.</p>
              <p>Nihil persius id est, iisque tincidunt abhorreant no duo. Eripuit placerat mnesarchum ius at, ei pro
                laoreet invenire persecuti, per magna tibique scriptorem an. Aeque oportere incorrupte ius ea, utroque
                erroribus mel in, posse dolore nam in. Per veniam vulputate intellegam et, id usu case reprimique, ne
                aperiam scaevola sed. Veritus omnesque qui ad. In mei admodum maiorum iracundia, no omnis melius eum, ei
                erat vivendo his. In pri nonumes suscipit.</p>
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