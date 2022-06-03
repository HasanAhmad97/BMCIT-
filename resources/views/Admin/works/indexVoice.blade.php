@extends('layouts.admin')
@section('content')
@php
  $title ='التعليق الصوتي';
  $color = '#fff';
@endphp

<main style=" direction: rtl;
text-align: right;" >
  <div class="album py-5 bg-light">
    <div class="container">

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

        @foreach ($works as $work)
        <div class="card shadow-sm" >
        <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>-->
          @if($work->voice->video)
          <div class="video video-2">
          <iframe src="{{$work->voice->video}}"  width="330" height="198" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>

             </div>
           @endif

           @if($work->voice->voice)
          <audio class="bd-placeholder-img card-img-top" alt="" class="bd-placeholder-img card-img-top" width="100%" height="225px" controls><source src="{{ asset('storage/' . $work->voice->voice) }}"  type="video/mp4"> </audio>
           @endif
            <h3 style="margin-right: 4%">{{$work->name}}</h3>
            <div class="card-body">
              <p class="card-text">{{$work->description}}</p>
              <div class="d-flex justify-content-between align-items-center">
                <small class="text-muted">
                  اللغة:{{$work->voice->lang }}
                </small>

                <small class="text-muted">
                  نوع الصوت:{{$work->voice->gender }}
                </small>
              </div>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <form method="POST" action="{{ route('work.delete',[$work->id])}}">
                        @csrf
                        @method('delete')
                        <input type="submit" class="btn btn-sm btn-outline-danger" value="حذف">
                        </form>
                        <form method="get" action="{{ route('work.edit',[$work->id])}}">
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