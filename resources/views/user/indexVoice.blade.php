@extends('layouts.home')
@section('content')
@php
  $title ='التعليق الصوتي';
@endphp

<script>
  b = document.getElementById('body');
  b.style.background = "#4A3274";
</script>

<style scoped>
    .la{
        background: #EB3B68;
        line-height:4rem;
        border-radius: 9px;
    }

    .img-voi{
      height: 10rem;
    overflow: hidden;
    width: 70%;
    transform: translate(-39%,-61%);
    }
    .img{
      max-width: 98%;
    position: relative;
    top: 56%;
    width: 252%;
    transform: translate(-9%,-41%);
    }
@media (max-width:640px){
  .img-voi{
      height: 10rem;
    overflow: hidden;
    display: none;
    width: 70%;
    transform: translate(-39%,-61%);
    }
    .img{
      max-width: 98%;
    position: relative;
    top: 56%;
    width: 252%;
    transform: translate(-9%,-41%);
    }
}

.gender{
  font-family: "Cairo";
  font-size: 20px;
}





    @media (min-width: 992px){
    .gender {
        flex: 0 0 63.333333%;
        max-width: 63.333333%;
        transform: translate(0%,0%);
    }
    }
</style>

<main style=" direction: rtl;
text-align: right;" >
  <div class="album py-5 bg-light">
    <div class="container">

      <h3 class="title">اعمالنا في مجال التعليق الصوتي <small>عربي -انجليزي</small></h3>

      <div class="row graid" style="margin-top: 6%">
        <div class="col-6"  style=" border-left:0.5vh solid #fff;">

          <div class="la title col-lg-4 col-12 mr-auto offset-4"><strong> اللغة العربية</strong></div>
          <div class="la title col-lg-6  col-12  mr-auto d-flex justify-content-center" style="background: #FCD428; margin-left:26%;">
            <div class=" gender order-0  col-md-8 col-lg-4  ml-4 col-11 col-sm-10 d-flex justify-content-center "><strong> صوت شاب </strong></div>
        <div  class='img-voi  order-8 position-absolute'>
             <img class="img" src="/img/02.png">
        </div>
          </div>
          <div class="row">
          @foreach ($works as $work)
          @if($work->voice->lang == 'العربية' && $work->voice->gender == 'صوت ذكوري' && $work->voice->video)
          <div class="col-6" >
          <div class="card shadow-sm card-voice" style="border-radius: 0% 0% 4% 4%;" >
          <div class="video video-2">
            <iframe src="{{$work->voice->video}}"class="iform-motion" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>

            </div>
            <h4 class="name name-motion">{{$work->name}}</h4>
              <div class="card-body">
                <p class="card-text">{{$work->description}}</p>
                <div class="d-flex justify-content-between align-items-center">
                  <small class="text-muted">
                    اللغة:{{$work->voice->lang }}
                  </small>
                </div>
              </div>
            </div>
          </div>
          @endif

          @if($work->voice->lang == 'العربية' && $work->voice->gender == 'صوت ذكوري' && $work->voice->voice)
          <div class="audio">
            <audio class="bd-placeholder-img card-img-top" alt="" class="bd-placeholder-img card-img-top" width="100%" height="225px" controls><source src="{{ asset('storage/' . $work->voice->voice) }}" > </audio>
            <h4 class="name name-motion">{{$work->name}}</h4>
              <div class="card-body">
                <p class="card-text">{{$work->description}}</p>
                <div class="d-flex justify-content-between align-items-center">
                  <small class="text-muted">
                    اللغة:{{$work->voice->lang }}
                  </small>
                </div>
              </div>
            </div>
          @endif
          @endforeach
      </div>
      <div class="la title col-lg-6  col-12  mr-auto d-flex justify-content-center" style="background: #FCD428; margin-left:26%;">
          <div class="gender order-0  col-md-8 col-lg-4  ml-4 col-11 col-sm-10 d-flex justify-content-center "><strong> صوت فتاة </strong></div>
      <div  class='img-voi  order-8 position-absolute'>
           <img class="img" src="/img/03.png">
      </div>
        </div>
          <div class="row">
            @foreach ($works as $work)
            @if($work->voice->lang  == 'العربية' && $work->voice->gender == 'صوت نسائي' && $work->voice->video)
            <div class="col-6" >
            <div class="card shadow-sm card-voice" style="border-radius: 0% 0% 4% 4%;" >
            <div class="video video-2">
              <iframe src="{{$work->voice->video}}"class="iform-motion" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>

              </div>
              <h4 class="name name-motion">{{$work->name}}</h4>
                <div class="card-body">
                  <p class="card-text">{{$work->description}}</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <small class="text-muted">
                      اللغة:{{$work->voice->lang }}
                    </small>
                  </div>
                </div>
              </div>
            </div>
            @endif

            @if($work->voice->lang  == 'العربية' && $work->voice->gender == 'صوت نسائي' && $work->voice->voice)
            <div class="audio">
              <audio class="bd-placeholder-img card-img-top" alt="" class="bd-placeholder-img card-img-top" width="100%" height="225px" controls><source src="{{ asset('storage/' . $work->voice->voice) }}" > </audio>
              <h4 class="name name-motion">{{$work->name}}</h4>
                <div class="card-body">
                  <p class="card-text">{{$work->description}}</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <small class="text-muted">
                      اللغة:{{$work->voice->lang }}
                    </small>
                  </div>
                </div>
              </div>
            @endif

            @endforeach
        </div>
      </div>

        <div class="col-6" style=" border-right:.5vh solid #fff;">
          <div class="la title col-lg-4 col-12 mr-auto offset-4"><strong> اللغة الانجليزية </strong></div>

          <div class="la title col-lg-6  col-12  mr-auto d-flex justify-content-center" style="background: #FCD428; margin-left:26%;">
            <div class=" gender order-0  col-md-8 col-lg-4  ml-4 col-11 col-sm-10 d-flex justify-content-center "><strong> صوت شاب </strong></div>
        <div  class='img-voi  order-8 position-absolute'>
             <img class="img" src="/img/02.png">
        </div>
          </div>
          <div class="row">
          @foreach ($works as $work)
          @if($work->voice->lang  == 'الانجليزية' && $work->voice->gender == 'صوت ذكوري' && $work->voice->video)
          <div class="col-6" >
          <div class="card shadow-sm card-voice" style="border-radius: 0% 0% 4% 4%;" >
          <div class="video video-2">
            <iframe src="{{$work->voice->video}}"class="iform-motion" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>

            </div>
            <h4 class="name name-motion">{{$work->name}}</h4>
              <div class="card-body">
                <p class="card-text">{{$work->description}}</p>
                <div class="d-flex justify-content-between align-items-center">
                  <small class="text-muted">
                    اللغة:{{$work->voice->lang }}
                  </small>
                </div>
              </div>
            </div>
          </div>
          @endif

          @if($work->voice->lang  == 'الانجليزية' && $work->voice->gender == 'صوت ذكوري' && $work->voice->voice)
          <div class="audio">
            <audio class="bd-placeholder-img card-img-top" alt="" class="bd-placeholder-img card-img-top" width="100%" height="225px" controls><source src="{{ asset('storage/' . $work->voice->voice) }}" > </audio>
            <h4 class="name name-motion">{{$work->name}}</h4>
              <div class="card-body">
                <p class="card-text">{{$work->description}}</p>
                <div class="d-flex justify-content-between align-items-center">
                  <small class="text-muted">
                    اللغة:{{$work->voice->lang }}
                  </small>
                </div>
              </div>
            </div>
          @endif
          @endforeach
      </div>

      <div class="la title col-lg-6  col-12  mr-auto d-flex justify-content-center" style="background: #FCD428; margin-left:26%;">
        <div class="gender order-0  col-md-8 col-lg-4  ml-4 col-11 col-sm-10 d-flex justify-content-center "><strong> صوت فتاة </strong></div>
    <div  class='img-voi order-8 position-absolute'>
         <img class="img" src="/img/03.png">
    </div>
      </div>
          <div class="row">
            @foreach ($works as $work)
            @if($work->voice->lang  == 'الانجليزية' && $work->voice->gender == 'صوت نسائي' && $work->voice->video)
            <div class="col-6" >
            <div class="card shadow-sm card-voice" style="border-radius: 0% 0% 4% 4%;" >
            <div class="video video-2">
              <iframe src="{{$work->voice->video}}"class="iform-motion" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>

              </div>
              <h4 class="name name-motion">{{$work->name}}</h4>
                <div class="card-body">
                  <p class="card-text">{{$work->description}}</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <small class="text-muted">
                      اللغة:{{$work->voice->lang }}
                    </small>
                  </div>
                </div>
              </div>
            </div>
            @endif

            @if($work->voice->lang == 'الانجليزية' && $work->voice->gender == 'صوت نسائي' && $work->voice->voice)
            <div class="audio">
              <audio class="bd-placeholder-img card-img-top" alt="" class="bd-placeholder-img card-img-top" width="100%" height="225px" controls><source src="{{ asset('storage/' . $work->voice->voice) }}" > </audio>
              <h4 class="name name-motion">{{$work->name}}</h4>
                <div class="card-body">
                  <p class="card-text">{{$work->description}}</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <small class="text-muted">
                      اللغة:{{$work->voice->lang }}
                    </small>
                  </div>
                </div>
              </div>
            @endif

            @endforeach
        </div>

        </div>
      </div>
    </div>
  </div>

    </main>


@endsection
