@extends('layouts.home')
@section('content')
@php
    $title =__('site.Motion graphic');
@endphp
<style scoped>
    .title{
        margin-top: 10%;
        margin-bottom: 5%;
        font-weight: bold;
    }
</style>

<style scoped>
    .video-2{
        width:100%;
        margin: 0%;
        height: 67%;
    }
    .shadow-sm{
        padding: 0%;
        overflow: hidden;
    }

    .des{
        margin-right:10%;
    }

    iframe{
        margin-left:0%;
    }

    .name-motion{
        margin-top: 5%;
        margin-right:5%;
        width: 90%
    }

    @media(min-width:2300px){
    iframe{
        height:21rem;
    }
}

@media(min-width:1990px) and (max-width:2300px){
    iframe{
        height:16rem;
    }
}

@media(min-width:1500px) and (max-width:1990px){
    iframe{
        height:12rem;
    }
}


</style>

    <div class="container-fluid text-center" style="{{ app() -> getLocale() === 'en' ? 'direction: ltr; text-align: left;' : 'direction: rtl; text-align: right;'}}">

        <h3 class="title text-center">{{__('site.Motion graphic')}}</h3>

        <div class="container">

            <div class="row mb-5 mr-4 text-right">

              <div class="col-11 col-md-5 align-items-center mb-3">
                  <img src="/img/portfolio/10.png" class="w-100" alt="">
              </div>

              <div class="col-12 col-md-6" style="{{ app() -> getLocale() === 'en' ? 'direction: ltr; text-align: left;' : 'direction: rtl; text-align: right;'}}">
                  <p style="font-size: 20px">
                      {{__('site.Designs in a modern and attractive style, taking into account the blending of colors, which gives your idea excellence and exclusivity')}}                  </p>

                  <form method="GET" action=" {{route('order.create')}}">
                      <button class="btn rounded" title="" style="background: #BE4443; font-weight:bold; color:white;">{{__('site.order now')}}</button>
                  </form>

              </div>

            </div>

          </div>

          <h3 class="title text-center col-12">{{__('site.Some of our projects')}}</h3>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 mb-5">

        @foreach ($works as $work)
            <div class="card shadow-sm col-lg-3 col-xl-3 col-sm-6 col-12 ml-0" style="border-radius: 0% 0% 4% 4%" >
                <div class="row">
            <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>-->
                <iframe class="col-12" src="{{$work->motion->path}}" class="iform-motion" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
            <h4 class="  name name-motion">{{$work->name}}</h4>
            <div class="des" style="width: 85%; margin-left:0%;" >
                {{$work->description}}
            </div>
            </div>
        </div>


        @endforeach
    </div>
    </div>

@endsection
