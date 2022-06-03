@extends('layouts.home')
@section('content')
@php
  $title =__('site.Web development and design');
@endphp

<style scoped>
    .title{
        margin-top: 10%;
        margin-bottom: 5%;
        font-weight: bold;

    }

      .btn-outline-primary{
        color: #00ADD9;
    border-color: #00ADD9;
    }
    .btn-outline-primary:hover {
    color: #fff;
    background-color: #00ADD9;
    border-color: #00ADD9;
}

.portfolio .portfolio-wrap .portfolio-links a{
        color: #BE4443;
        background: #ebe6e6
    }

    .portfolio .portfolio-wrap .portfolio-links a:hover{
        background: #BE4443;
    }
    .portfolio .portfolio-wrap::before{
    background: rgba(65, 140, 226, 0.7);
    border-radius: 20px;
}
</style>

    <div class="container-fluid align-items-centerrow " style="{{ app() -> getLocale() === 'en' ? 'direction: ltr; text-align: left;' : 'direction: rtl; text-align: right;'}}">

      <h3 class="title text-center col-12">{{__('site.Web development and design')}}</h3>

      <div class="container">

      <div class="row mb-5 mr-4 text-right">

        <div class="col-11 col-md-5 align-items-center mb-3">
            <img src="/img/portfolio/3.png" class="w-100" alt="">
        </div>

        <div class="col-12 col-md-6" style="{{ app() -> getLocale() === 'en' ? 'direction: ltr; text-align: left;' : 'direction: rtl; text-align: right;'}}">
            <p style="font-size: 20px">
                {{__('site.designing according to the latest developed professional methods and providing all interactive tools for the website')}}            </p>

            <form method="GET" action=" {{route('order.create')}}">
                <button class="btn rounded" title="" style="background: #BE4443; font-weight:bold; color:white;"> {{__('site.order now')}}</button>
            </form>

        </div>

      </div>

    </div>

      <!--<div class=" container mb-5">
      <div class="row" style="background:rgba(118,185,201,0.4); border-radius:15px;">
        <img class="col-2" src="/img/portfolio/portfolio-18.jpeg" class="w-100" alt="">
        <p class="col-10" style="font-size: 20px">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>

        <div class="col-12 d-flex justify-content-center align-items-center">
        <form class="col-2 mb-2 d-flex justify-content-center" method="GET" action=" {{route('user.identity')}}">
            <button class="btn btn-warning rounded" title="" style=" font-weight: bold;"> طلب خدمة</button>
        </form>
    </div>-->

    <h3 class="title text-center col-12">{{__('site.Some of our projects')}}</h3>

     </div>

    <section id="portfolio" class="portfolio">
        <div class=" container">

          <div class="row portfolio-container">

            @foreach ($works as $work)
              <div class="col-lg-4 col-md-6 portfolio-item">
                  <div class="portfolio-wrap">
                    <img src="{{ asset('storage/' .$work->web->image ) }}" class="bd-placeholder-img card-img-top" alt="" class="bd-placeholder-img card-img-top" width="100%" height="225px" style="border-radius: 2%">

                  <div class="portfolio-links">
                    <h4 class="name" style=" font-weight:bold; color:white">{{$work->name}}</h4>
                    <a href="{{$work->web->link}}" class="venobox"><i class="bx bx-window-open"></i></a>
                    <a href="{{ asset('storage/' .$work->web->image) }}" data-gall="portfolioGallery" class="venobox" title="{{$work->name}}"><i class="bx bx-plus"></i></a>
                    </div>

                  </div>

          </div>
          @endforeach

        </div>
        </div>
      </section>

@endsection
