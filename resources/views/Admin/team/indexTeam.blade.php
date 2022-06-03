@extends('layouts.admin')
@section('content')
@php
  $title ='أعضاء الفريق';
  $color = '#fff';
@endphp

<main style=" direction: rtl;
text-align: right;" >
  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

        @foreach ($teams as $team)
          <div class="card shadow-sm" >
          <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>-->
            <img src="{{ asset('storage/' .$team->image ) }}" class="bd-placeholder-img card-img-top" alt="" class="bd-placeholder-img card-img-top" width="100%" height="225px">
            <h3 style="margin-right: 4%">{{$team->name}}</h3>
            <div class="card-body">
              <p class="card-text">{{$team->occupation}}</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <form method="POST" action="{{ route('team.delete',[$team->id])}}">
                        @csrf
                        @method('delete')
                        <input type="submit" class="btn btn-sm btn-outline-danger" value="حذف">
                        </form>
                        <form method="get" action="{{ route('team.edit',[$team->id])}}">
                            <input type="submit" class="btn btn-sm btn-outline-success" value="تعديل">
                        </form>
                    </div>
              </div>
            </div>
          </div>

        @endforeach
    </div>
    </div>
  </div>

</main>

@endsection
