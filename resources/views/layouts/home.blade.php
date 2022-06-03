<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{$title}}</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="/img/logo.png" rel="icon">
  <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="/assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lemonada&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Tajawal&display=swap" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="/assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="/css/style.css">

  <style scoped>
      @if(app() -> getLocale() === 'ar')
    header nav ul{
        direction: rtl;
        text-align: right;

    }
      @else
       header nav ul{
          direction: ltr;
          text-align: left;

      }
      @endif

    #header .logo img{
        max-height: 122px;
        transform: translate(0px,-27px);
        height: 166%;
    }

    .portfolio{
    direction: ltr;
    text-align: left;
}
</style>

  <!-- =======================================================
  * Template Name: Scaffold - v2.2.0
  * Template URL: https://bootstrapmade.com/scaffold-bootstrap-metro-style-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex">

      <div class="logo mr-auto col-md-3 col-6 col-lg-2 " style="height: 4rem">
        <!-- Uncomment below if you prefer to use an image logo -->
        <a href="{{route('user.home')}}"><img  src="/img/logo.png" alt="" class="img-fluid w-75"></a>
      </div>

      <nav class="nav-menu d-none d-lg-block nav mr-4">
        <ul class ="navbar-nav mr-auto flex-column-reverse flex-md-row">
          <li class="active"><a href="{{route('user.home')}}"> {{__('site.Home')}}</a></li>
          <li><a href="/#about">{{__('site.About us')}}</a></li>
          <li><a href="/#services">{{__('site.Services')}}</a></li>
          <li class="drop-down"><a href="">{{__('site.Our projects')}}</a>
            <ul>
              <li><a href="{{route('user.web')}}">{{__('site.Web development and design')}}</a></li>
              <li><a href="{{route('user.app')}}">{{__('site.Mobile development and design')}}</a></li>
{{--              <li><a href="{{route('user.ui')}}">{{__('site.UI/UX')}}</a></li>--}}
              <li><a href="{{route('user.Motion')}}">{{__('site.Motion graphic')}}</a></li>
{{--              <li><a href="{{route('user.identity')}}">{{__('site.E-marketing')}}</a></li>--}}
              <li><a href="{{route('user.image')}}">{{__('site.Social media ads')}}</a></li>
              <li><a href="{{route('user.logo')}}">{{__('site.Logos & visual identity')}}</a></li>
            </ul>
          </li>

          <li><a href="/#portfolio">{{__('site.portfolio')}}</a></li>
          <li><a href="/#team">{{__('site.Team')}}</a></li>
          <li><a href="/#contact">{{__('site.Contact us')}}</a></li>


                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                <li>
                    <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}"
                       href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                        {{ $properties['native'] }}
                    </a>
                </li>

                @endforeach


        </ul>
      </nav><!-- .nav-menu -->

      <div class="header-social-links text-center row">
        <a href="#" class="twitter col-3"><i class="icofont-twitter"></i></a>
        <a href="https://www.facebook.com/BMTcit" class="facebook col-2"><i class="icofont-facebook"></i></a>
        <a href="https://t.me/BMTJOBs" class="facebook col-2"><i class=" icofont-telegram"></i></a>
        <a href="#" class="instagram col-3"><i class="icofont-instagram"></i></a>
        <a href="https://linkedin.com/company/bmtcitt" class="linkedin col-2"><i class="icofont-linkedin"></i></a>
      </div>

    </div>
  </header><!-- End Header -->


@yield('content')


<!-- ======= Footer ======= -->
<footer id="footer" style="{{ app() -> getLocale() === 'en' ? 'direction: ltr; text-align: left;' : 'direction: rtl; text-align: right;'}}">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-6 col-md-6">
            <div class="footer-info">
              <h3>BMT</h3>
              <p>
            {{__('site.Gaza-Jamal al nasser st -Al Roaya tower 3')}}
               <br>
                <strong>{{__('site.phone number')}}:</strong> +970567009949<br>
                <strong>{{__('site.Email')}}:</strong> infobmt@bmtcit.com<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="https://www.facebook.com/BMTcit" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="https://t.me/BMTJOBs" class="facebook"><i class="bx bxl-telegram"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="https://linkedin.com/company/bmtcitt" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>

        <div class="col-lg-6 col-md-6 footer-links">
            <h4></h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="{{route('user.web')}}">{{__('site.Web development and design')}}</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{route('user.app')}}">{{__('site.Mobile development and design')}}</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{route('user.Motion')}}">{{__('site.Motion graphic')}}</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{route('user.ui')}}">{{__('site.UI/UX')}}</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">{{__('site.E-marketing')}}</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{route('user.image')}}">{{__('site.Social media ads')}}</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{route('user.logo')}}">{{__('site.Logos & visual identity')}}</a></li>


            </ul>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy;{{__('site.All rights reserved to')}}
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/scaffold-bootstrap-metro-style-template/ -->
       BMT 2021</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <!-- Vendor JS Files -->
  <script src="/assets/vendor/jquery/jquery.min.js"></script>
  <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="/assets/vendor/php-email-form/validate.js"></script>
  <script src="/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="/assets/vendor/venobox/venobox.min.js"></script>
  <script src="/assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="/assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="/assets/js/main.js"></script>

</body>

</html>

