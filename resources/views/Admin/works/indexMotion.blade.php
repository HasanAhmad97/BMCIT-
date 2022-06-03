@extends('layouts.admin')
@section('content')
@php
    $title ='الموشن جرافيكس';
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
            <!--<iframe class="bd-placeholder-img card-img-top" alt="" class="bd-placeholder-img card-img-top" width="100%" height="225px" src="https://youtu.be/2aGIb-ubWws" allowfullscreen allowtransparency allow="autoplay"> </iframe>-->

            <div class="video video-2">
            <iframe src="{{$work->motion->first()->path}}" width="330" height="198" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>

               </div>

          <script></script>
            <h3 style="margin-right: 4%">{{$work->name}}</h3>
            <div class="card-body">
                <p class="card-text">{{$work->description}}</p>
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
