@extends("layouts.home")
@section('content')

<script src="https://kit.fontawesome.com/8066c96442.js" crossorigin="anonymous"></script>

@php
    if (app()->getLocale()=='ar')
    $title = 'BMT - الصفحة الرئيسية';


    else
        $title='BMT - Home Page';



@endphp
<style scoped>
.btn-team {
    background: #009cea;
    display: inline-block;
    padding: 8px 30px;
    border-radius: 4px;
    color: #fff;
    font-size: 13px;
    font-family: "Raleway", sans-serif;
    font-weight: 600;
    text-transform: uppercase;
}

.contact .php-email-form .error-message {
    background: #1aa363;
}

section h2{
    font-family: Tajawal;
}

.about .content h3{
    font-family: Tajawal;
}


.portfolio .portfolio-wrap::before{
    background: rgba(58,131,195, 0.5)
}



</style>

  <!-- ======= Hero Section ======= -->
  <section id="hero" style="{{ app() -> getLocale() === 'en' ? 'direction: ltr; text-align: left;' : 'direction: rtl; text-align: right;'}}">

    @if(session('sccessOrder'))
<div class="sufee-alert alert with-close alert-success alert-dismissible fade show d-flex container">
  <span class="badge badge-pill badge-success">تم ارسال الطلب</span>
  {{session('sccessOrder')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
    <div class="container">
      <div class="row">
        <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="fade-up">
          <div>
            <h1>{{__('site.We develop technical products that help grow your business')}}</h1>
            <h2 style="font-weight: bold">{{__('site.Feel free to request our services or request a free consultation, we have specialized experts available all the time')}}</h2>
            <a href="https://wa.me/message/FK5F7UT7M323H1" class="btn-get-started scrollto" style="font-size: 18px">  <i class="fa fa-whatsapp" style="font-size:20px"></i>{{__('site.Whatsapp chat')}}</a>
            <a href="{{route('order.create')}}" class="btn-get-started scrollto" style="font-size: 18px; background:#3A83C3"> </i>{{__('site.Service order')}}</a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left">
          <img src="/assets/img/hero-img.png" class="img-fluid" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main" style="{{ app() -> getLocale() === 'en' ? 'direction: ltr; text-align: left;' : 'direction: rtl; text-align: right;'}}">

 <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row">
          <div class="col-lg-6" data-aos="zoom-in">
            <img src="assets/img/about.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 d-flex flex-column justify-contents-center" data-aos="fade-left">
            <div class="content pt-4 pt-lg-0">
              <h3>{{__('site.About us')}}</h3>
              <h4>{{__('site.Technology pioneers')}}</h4>
              <p class="">
                {{__("site.BMT team relies on modern and emerging software in the digital world to build our projects or clients' projects with the latest technology available to us on the path of renewable technology")}}
              </p>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Features Section ======= -->
    <!--<section id="features" class="features">
      <div class="container">

        <div class="row">
          <div class="col-lg-6 mt-2 mb-tg-0 order-2 order-lg-1">
            <ul class="nav nav-tabs flex-column">
              <li class="nav-item" data-aos="fade-up">
                <a class="nav-link active show" data-toggle="tab" href="#tab-1">
                  <h4>Modi sit est</h4>
                  <p>Quis excepturi porro totam sint earum quo nulla perspiciatis eius.</p>
                </a>
              </li>
              <li class="nav-item mt-2" data-aos="fade-up" data-aos-delay="100">
                <a class="nav-link" data-toggle="tab" href="#tab-2">
                  <h4>Unde praesentium sed</h4>
                  <p>Voluptas vel esse repudiandae quo excepturi.</p>
                </a>
              </li>
              <li class="nav-item mt-2" data-aos="fade-up" data-aos-delay="200">
                <a class="nav-link" data-toggle="tab" href="#tab-3">
                  <h4>Pariatur explicabo vel</h4>
                  <p>Velit veniam ipsa sit nihil blanditiis mollitia natus.</p>
                </a>
              </li>
              <li class="nav-item mt-2" data-aos="fade-up" data-aos-delay="300">
                <a class="nav-link" data-toggle="tab" href="#tab-4">
                  <h4>Nostrum qui quasi</h4>
                  <p>Ratione hic sapiente nostrum doloremque illum nulla praesentium id</p>
                </a>
              </li>
            </ul>
          </div>
          <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in">
            <div class="tab-content">
              <div class="tab-pane active show" id="tab-1">
                <figure>
                  <img src="assets/img/features-1.png" alt="" class="img-fluid">
                </figure>
              </div>
              <div class="tab-pane" id="tab-2">
                <figure>
                  <img src="assets/img/features-2.png" alt="" class="img-fluid">
                </figure>
              </div>
              <div class="tab-pane" id="tab-3">
                <figure>
                  <img src="assets/img/features-3.png" alt="" class="img-fluid">
                </figure>
              </div>
              <div class="tab-pane" id="tab-4">
                <figure>
                  <img src="assets/img/features-4.png" alt="" class="img-fluid">
                </figure>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>--><!-- End Features Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>{{__('site.Services')}}</h2>
          <p></p>
        </div>

        <div class="row">
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-3" data-aos="zoom-in">
            <div class="icon-box icon-box-web">
              <div class="icon"><i class="bx bx-terminal"></i></div>
              <h4 class="title"><a href="{{route('order.create')}}">{{__('site.Web development and design')}}</a></h4>
              <p class="description">{{__('site.designing according to the latest developed professional methods and providing all interactive tools for the website')}}</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-3" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box icon-box-green">
              <div class="icon"><i class="bx bx-mobile-alt"></i></div>
              <h4 class="title"><a href="{{route('order.create')}}">{{__('site.Mobile development and design')}}</a></h4>
              <p class="description">{{__('site.We apply')}}</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-3" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box icon-box-cyan">
              <div class="icon"><i class="bx bx-play-circle"></i></div>
              <h4 class="title"><a href="{{route('order.create')}}">{{__('site.Motion graphic')}}</a></h4>
              <p class="description">{{__('site.Designs in a modern and attractive style, taking into account the blending of colors, which gives your idea excellence and exclusivity')}}

                </p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-3" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box icon-box-pink">
              <div class="icon"><i class="bx bx-paint"></i></div>
              <h4 class="title"><a href="{{route('order.create')}}">{{__('site.Logos & visual identity')}}</a></h4>
              <p class="description">{{__('site.Designs in a modern and attractive style, taking into account the blending of colors, which gives your idea excellence and exclusivity, and we apply the ideas')}}</p>
            </div>
          </div>


          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-3" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box icon-box-ui">
              <div class="icon"><i class="bx bxl-redux"></i></div>
              <h4 class="title"><a href="{{route('order.create')}}">UI/UX</a></h4>
              <p class="description">{{__('site.Designing the interface of your digital product to suit the needs of your customers')}}
                </p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-3" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box icon-box-img">

              <div class="icon"><i class="fab fa-facebook-f"></i></div>
              <h4 class="title"><a href="{{route('order.create')}}">{{__('site.Social media ads')}}</a></h4>
              <p class="description">{{__('site.creative ideas and designs that fit your business or product goals at low costs')}}</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-3" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box icon-box-blue">
              <div class="icon"><i class="bx bx-bar-chart-alt"></i></div>
              <h4 class="title"><a href="{{route('order.create')}}">{{__('site.E-marketing')}}</a></h4>
              <p class="description">{{__('site.We help you to develop and study a digital marketing plan for your product in a highly professional manner')}}</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-3" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box icon-box-add">
              <div class="icon"><i class="bx bx-grid-alt"></i></div>
              <h4 class="title"><a href="{{route('order.create')}}">{{__('site.Other services')}}</a></h4>
              <p class="description">{{__('site.We offer many services and technical advice for free, and we adopt your product from scratch until achieving success')}}</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>{{__('site.Gallery')}}</h2>
          <p>
            </p>
        </div>

        <div class="row portfolio-container">
            <div class="col-lg-3 col-md-6 portfolio-item">
                <div class="portfolio-wrap">
                <img src="/img/portfolio/portfolio-11.jpeg" class="w-100" alt="">

                <div class="portfolio-links">
                    <form method="GET" action=" {{route('user.Motion')}}">
                        <button class="btn btn-warning rounded" title="">{{__('site.go to page')}}</button>
                    </form>
                  </div>

                </div>

        </div>

        <div class="col-lg-3 col-md-6 portfolio-item">
            <div class="portfolio-wrap">
            <img src="/img/portfolio/portfolio-12.jpeg" class="w-100" alt="">

            <div class="portfolio-links">
                <form action="{{route('user.ui')}}">
                    <button class="btn btn-warning rounded" title="">{{__('site.go to page')}}</button>
                </form>
              </div>

            </div>

    </div>

    <div class="col-lg-3 col-md-6 portfolio-item">
        <div class="portfolio-wrap">
        <img src="/img/portfolio/portfolio-13.jpeg" class="w-100" alt="">

        <div class="portfolio-links">
            <form action="{{route('user.app')}}">
                <button class="btn btn-warning rounded" title="">{{__('site.go to page')}}</button>
            </form>
          </div>

        </div>

</div>

<div class="col-lg-3 col-md-6 portfolio-item">
    <div class="portfolio-wrap">
    <img src="/img/portfolio/portfolio-14.jpeg" class="w-100" alt="">

    <div class="portfolio-links">
        <form method="GET" action="{{route('user.web')}}">
            <button class="btn btn-warning rounded" title="">{{__('site.go to page')}}</button>
        </form>
      </div>

    </div>

</div>

<div class="col-lg-3 col-md-6 portfolio-item">
  <div class="portfolio-wrap">
  <img src="/img/portfolio/portfolio-15.jpeg" class="w-100" alt="">

  <div class="portfolio-links">
    <form action="{{route('user.Motion')}}">
        <button class="btn btn-warning rounded" title="">{{__('site.go to page')}}</button>
    </form>
    </div>

  </div>

</div>

<div class="col-lg-3 col-md-6 portfolio-item">
  <div class="portfolio-wrap">
  <img src="/img/portfolio/portfolio-16.jpeg" class="w-100" alt="">

  <div class="portfolio-links">
    <form action="{{route('user.logo')}}">
        <button class="btn btn-warning rounded" title="">{{__('site.go to page')}}</button>
    </form>
    </div>

  </div>

</div>

<div class="col-lg-3 col-md-6 portfolio-item">
  <div class="portfolio-wrap">
  <img src="/img/portfolio/portfolio-17.jpeg" class="w-100" alt="">

  <div class="portfolio-links">
    <form action="{{route('user.image')}}">
        <button class="btn btn-warning rounded" title="">{{__('site.go to page')}}</button>
    </form>
    </div>

  </div>

</div>

<div class="col-lg-3 col-md-6 portfolio-item">
  <div class="portfolio-wrap">
  <img src="/img/portfolio/portfolio-18.jpeg" class="w-100" alt="">

  <div class="portfolio-links">
    <form method="GET" action="">
        <button class="btn btn-warning rounded" title="">{{__('site.go to page')}}</button>
    </form>
    </div>

  </div>

</div>

      </div>
    </section>
          <!--<div class="col-lg-12 d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">الكل</li>
              <li data-filter=".filter-app">تطبيقات الهاتق</li>
              <li data-filter=".filter-web">مواقع الانترنت</li>
              <li data-filter=".filter-card">الوقو وهوية بصرية</li>
              <li data-filter=".filter-image">تصميم الصور والاعلانات</li>
              <li data-filter=".filter-ui">UX/UI</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

        @foreach($app as $app)
          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="{{ asset('storage/' .$app->app->image) }}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>{{$app->name}}</h4>
                <p>{{$app->description}}</p>
              </div>
              <div class="portfolio-links">
                <a href="{{ asset('storage/' .$app->app->image) }}" data-gall="portfolioGallery" class="venobox" title="{{$app->name}}"><i class="bx bx-plus"></i></a>
                <a href="{{$app->app->link}}" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>
          @endforeach

          @foreach($web as $web)

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="{{ asset('storage/' .$web->web->image) }}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>{{$web->name}}</h4>
                <p>{{$web->description}}</p>
              </div>
              <div class="portfolio-links">
                <a href="{{ asset('storage/' .$web->web->image) }}" data-gall="portfolioGallery" class="venobox" title="{{$web->name}}"><i class="bx bx-plus"></i></a>
                <a href="{{$web->web->link}}" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>
          @endforeach

          @foreach($logo as$logo)

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="{{ asset('storage/' .$logo->logo->first()->image) }}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>{{$logo->name}}</h4>
                <p>{{$logo->description}}</p>
              </div>
              <div class="portfolio-links">
                <a href="{{ asset('storage/'.$logo->logo->first()->image) }}" data-gall="portfolioGallery" class="venobox" title="{{$logo->name}}"><i class="bx bx-plus"></i></a>
              </div>
            </div>
          </div>

          @endforeach

          @foreach($ui as$ui)

          <div class="col-lg-4 col-md-6 portfolio-item filter-ui">
            <div class="portfolio-wrap">
              <img src="{{ asset('storage/' .$ui->logo->first()->image) }}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>{{$ui->name}}</h4>
                <p>{{$ui->description}}</p>
              </div>
              <div class="portfolio-links">
                <a href="{{ asset('storage/'.$ui->logo->first()->image) }}" data-gall="portfolioGallery" class="venobox" title="{{$ui->name}}"><i class="bx bx-plus"></i></a>
              </div>
            </div>
          </div>

          @endforeach

          @foreach($image as $imag)

          <div class="col-lg-4 col-md-6 portfolio-item filter-image">
            <div class="portfolio-wrap">
              <img src="{{ asset('storage/' .$imag->logo->first()->image) }}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>{{$imag->name}}</h4>
                <p>{{$imag->description}}</p>
              </div>
              <div class="portfolio-links">
                <a href="{{ asset('storage/'.$imag->logo->first()->image) }}" data-gall="portfolioGallery" class="venobox" title="{{$imag->name}}"><i class="bx bx-plus"></i></a>
              </div>
            </div>
          </div>

          @endforeach

        </div>

      </div>
    </section>--><!-- End Portfolio Section -->

    <!-- ======= Cta Section ======= --><!-- End Cta Section -->

    <!-- ======= Testimonials Section ======= -->
<!-- End Testimonials Section -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>{{__('site.our team')}}</h2>
          <p></p>
        </div>

        <div class="row">

            @foreach($teams as $team)
          <div class="col-lg-3 col-md-6">
            <div class="member" data-aos="zoom-in">
              <div class="pic"><img src="{{ asset('storage/'. $team->image) }}" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>{{$team->name}}</h4>
                <span>{{$team->occupation}}</span>
                <div class="social">
                  <a href="{{$team->link}}"><i class="icofont-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          @endforeach

          <div class="text-center col-12 mt-4">
            <div class="text-center btn-team">
                <a href="{{route('user.team')}}" style=" color: #fff;" class="btn-buy">{{__('site.our team')}}</a>
              </div>
        </div>

        </div>

      </div>
    </section><!-- End Team Section -->

    <!-- ======= Clients Section ======= -->

    <!-- ======= Pricing Section ======= -->
    <!-- End Pricing Section -->

    <!-- ======= F.A.Q Section ======= -->
    <!-- End Frequently Asked Questions Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact section-bg">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>{{__('site.contact us')}}</h2>
        </div>

        <div class="row">

          <div class="col-lg-5 d-flex align-items-stretch" data-aos="fade-right">
            <div class="info">
              <div class="address">
                <i class="icofont-google-map"></i>
                <h4>{{__('site.address')}}:</h4>
                <p>{{__('site.Gaza-Jamal al nasser st -Al Roaya tower 3')}}</p>

              </div>

              <div class="email">
                <i class="icofont-envelope"></i>
                <h4>{{__('site.Email')}}:</h4>
                <p>bmt@gmail.com</p>
              </div>

              <div class="phone">
                <i class="icofont-phone"></i>
                <h4>:{{__('site.phone number')}}</h4>
                <p>+970567009949</p>
              </div>

              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d118718.07942187184!2d34.5432213429837!3d31.495852481518178!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14fd7f054e542767%3A0x7ff98dc913046392!2z2LrYstip!5e0!3m2!1sar!2s!4v1610568085951!5m2!1sar!2s" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
            </div>

          </div>

          <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch" data-aos="fade-left">
            <form action="{{route('work.storeMessage')}}" method="post" role="form" class="php-email-form">
                @csrf
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="name">{{__('site.Name')}}</label>
                  <input type="text" name="name" class="form-control" id="name" data-rule="minlen:4" data-msg="من فضلك ادخل اسم اكثر من 4 حروف" />
                  <div class="validate"></div>
                </div>
                <div class="form-group col-md-6">
                  <label for="name">{{__('site.Email')}}</label>
                  <input type="email" class="form-control" name="email" id="email" data-rule="email" data-msg="من فضلك ادخل بريد الكتروني صحيح" />
                  <div class="validate"></div>
                </div>
              </div>
              <div class="form-group">
                <label for="name">{{__('site.subject')}}</label>
                <input type="text" class="form-control" name="subject" id="subject" data-rule="minlen:4" data-msg="من فضلك ادخل اسم الموضوع اكثر من 8 احرف" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <label for="name">{{__('site.message')}}</label>
                <textarea class="form-control" name="message" rows="10" data-rule="required" data-msg="من فضلك اكتب شي لنا"></textarea>
                <div class="validate"></div>
              </div>
              <div class="mb-3">
                <div class="loading">{{__('site.loading')}}..</div>
                <div class="error-message"></div>
                <div class="sent-message">{{__('site.message sent successfuly')}}</div>
              </div>
              <div class="text-center"><button type="submit">{{__('site.send message')}}</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  @endsection
