@extends('layouts.home')
@section('content')
@php
  $title ='UI/UX';
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
    <div class="container-fluid">

      <h3 class="title text-center"> UI/UX </h3>

      <div class="container">

        <div class="row mb-5 mr-4 text-right">

          <div class="col-11 col-md-5 align-items-center mb-3">
              <img src="/img/portfolio/9.png" class="w-100" alt="">
          </div>

          <div class="col-12 col-md-6">
              <p style="font-size: 20px">
                نوفر لك تصاميم احترافية لتسهيل وتطوير التصميم الخاصة بمشروعك، لضمان جودة عالية  وتصميم احترافي يتناسب مع اهداف منتجك الرقمي  بتكاليف قليلة ومجهود اقل.
              </p>

              <form method="GET" action=" {{route('order.create')}}">
                  <button class="btn rounded" title="" style="background: #BE4443; font-weight:bold; color:white;"> اطلب الان</button>
              </form>

          </div>

        </div>

      </div>

      <h3 class="title text-center col-12">من اعمالنا في مجال UI/UX</h3>
    </div>

    <section id="portfolio" class="portfolio">
        <div class=" container">

          <div class="row portfolio-container">

            @foreach ($works as $work)
              <div class="col-lg-4 col-md-6 portfolio-item">
                  <div class="portfolio-wrap">
                    <img class="log" src="{{ asset('storage/' . $work->logo->first()->image) }}" class="bd-placeholder-img card-img-top" alt="" class="bd-placeholder-img card-img-top" width="100%" height="300px" style="border-radius: 5%">

                  <div class="portfolio-links">
                    <h4 class="name"  font-weight:bold; color:white">{{$work->name}}</h4>
                    <a href="{{ asset('storage/' .$work->logo->first()->image) }}" data-gall="portfolioGallery" class="venobox" title="{{$work->name}}"><i class="bx bx-plus"></i></a>
                    </div>

                  </div>

          </div>
          @endforeach

        </div>
        </div>
      </section>

@endsection
