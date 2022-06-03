@extends('layouts.home')
@section('content')
@php
  $title ='عرض اعضاء الفريق';
@endphp

<style scoped>
    .title{
        margin-top: 10%;
        margin-bottom: 5%;
        font-weight: bold;
    }

    .social a{

    transition: color 0.3s;
    color: #627680;
    }

    .social a:hover {
    color: #009cea;
}
</style>

    <div class="container-fluid text-center mb-5">

      <h3 class="title text-center">اعضاء الفريق</h3>

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

        @foreach ($teams as $team)
          <div class="card shadow-sm col-lg-3 col-xl-3 col-sm-6 col-12 ml-0 mb-5" >
          <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>-->
            <img src="{{ asset('storage/' .$team->image ) }}" alt=""  width="100%" height="360px">
            <h4 class="name" style="margin-right: 4%">{{$team->name}}</h4>
            <div class="card-body">
              <p class="card-text">{{$team->occupation}}</p>
              <div class="align-items-center text-center">
                <div class="social">
                    <a href="{{$team->link}}"><i class="icofont-linkedin"></i></a>
                  </div>
              </div>
            </div>
          </div>

        @endforeach
    </div>
    </div>

@endsection
