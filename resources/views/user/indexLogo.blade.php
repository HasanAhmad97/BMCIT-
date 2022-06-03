@extends('layouts.home')
@section('content')
@php
  $title =__('site.Logos & visual identity');
@endphp

<style scoped>
    .title{
        margin-top: 10%;
        margin-bottom: 5%;
        font-weight: bold;
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

<div class="container-fluid" style="{{ app() -> getLocale() === 'en' ? 'direction: ltr; text-align: left;' : 'direction: rtl; text-align: right;'}}">

      <h3 class="title text-center">{{__('site.Logos & visual identity')}}</h3>

      <div class="container">

        <div class="row mb-5 mr-4 text-right">

          <div class="col-11 col-md-5 align-items-center mb-3">
              <img src="/img/portfolio/4.png" class="w-100" alt="">
          </div>

          <div class="col-12 col-md-6" style="{{ app() -> getLocale() === 'en' ? 'direction: ltr; text-align: left;' : 'direction: rtl; text-align: right;'}}">
              <p style="font-size: 20px">
                  {{__('site.Visual identity')}}
              </p>

              <form method="GET" action=" {{route('order.create')}}">
                  <button class="btn rounded" title="" style="background: #BE4443; font-weight:bold; color:white;"> {{__('site.order now')}}</button>
              </form>

          </div>

        </div>

      </div>

      <h3 class="title text-center col-12">{{__('site.Some of our projects')}}</h3>

</div>

    <section id="portfolio" class="portfolio">
        <div class=" container">

          <div class="row portfolio-container">

            @foreach ($works as $work)
              <div class="col-lg-4 col-md-6 portfolio-item">
                  <div class="portfolio-wrap">
                    <img class="log" src="{{ asset('storage/' . $work->logo->first()->image) }}" class="bd-placeholder-img card-img-top" alt="" class="bd-placeholder-img card-img-top" width="100%" height="300px" style="border-radius: 5%">

                  <div class="portfolio-links">
                    <h4 class="name" style=" font-weight:bold; color:white">{{$work->name}}</h4>
                    <a href="{{ asset('storage/' .$work->logo->first()->image) }}" data-gall="portfolioGallery" class="venobox" title="{{$work->name}}"><i class="bx bx-plus"></i></a>
                    </div>

                  </div>

          </div>
          @endforeach

        </div>
        </div>
      </section>

@endsection
