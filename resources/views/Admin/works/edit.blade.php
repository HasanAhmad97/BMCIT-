@extends('layouts.admin')

@php
$title = "تعديل";
$color = "#E5E5E5";
@endphp

@section('content')

@if($errors->any())
<div class="alert alert-danger er">
    @foreach($errors->all() as $error)
    <p>{{$error}}</p>
    @endforeach
</div>
@endif

@if(session('sccess'))
<div class="alert alert-success al">{{ session('sccess') }} </div>
@endif


<form method='post' action="{{route('work.update',[$work->id])}}" enctype="multipart/form-data" class="formCreat">
    @csrf
    <div class="text">تعديل {{$work->name}}</div>
    <div class="form-group is-invalid">
        <label for="exampleInputEmaill">اسم العمل </label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmaill" value="{{old('name',$work->name)}}">
        @error('name')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="description">وصف العمل</label>
        <textarea name="description" class="form-control  @error('description') is-invalid @enderror" id="description">{{old('description',$work->description)}}</textarea>
        @error('description')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class='form-group'>
        <label for="serviceType">نوع الخدمة</label>
        <select name="serviceType" id="serviceType" onchange='myfunction()' class="form-control @error('serviceType') is-invalid @enderror">
            <option> ---------</option>
            <option value="1" @if(old('serviceType',$work->serviceType)=='Motion Graphics')) selected @endif> موشن جرافيكس</option>
            <option value="2" @if(old('serviceType',$work->serviceType)=='Logo')) selected @endif>لوقو </option>
            <option value="3" @if(old('serviceType',$work->serviceType)=='Visual Identity')) selected @endif >الهوية البصرية </option>
            <option value="4" @if(old('serviceType',$work->serviceType)=='Voice-over')) selected @endif>التعليق الصوتي </option>
            <option value="5" @if(old('serviceType',$work->serviceType)=='Web Design')) selected @endif>تصميم المواقع</option>
            <option value="6" @if(old('serviceType',$work->serviceType)=='Web Programming')) selected @endif>برمجة المواقع </option>
            <option value="7" @if(old('serviceType',$work->serviceType)=='App Design')) selected @endif>تصميم التطبيقات </option>
            <option value="8" @if(old('serviceType',$work->serviceType)=='App Programming')) selected @endif>برمجة التطبيقات </option>

            <option >---------</option>
            <option value="1" @if(old('serviceType',$work->serviceType)=='Motion Graphics')) selected @endif> موشن جرافيكس</option>
            <option value="2" @if(old('serviceType',$work->serviceType)=='Logo')) selected @endif>لوقو </option>
            <option value="3" @if(old('serviceType',$work->serviceType)=='Visual Identity')) selected @endif >الهوية البصرية </option>
            <option value="4" @if(old('serviceType',$work->serviceType)=='Web Design')) selected @endif>تصميم المواقع</option>
            <option value="5" @if(old('serviceType',$work->serviceType)=='Web Programming')) selected @endif>برمجة المواقع </option>
            <option value="6" @if(old('serviceType',$work->serviceType)=='App Design')) selected @endif>تصميم التطبيقات </option>
            <option value="7" @if(old('serviceType',$work->serviceType)=='App Programming')) selected @endif>برمجة التطبيقات </option>
            <option value="8" @if(old('serviceType',$work->serviceType)=='ux/ui')) selected @endif>UI/UX </option>
            <option value="9" @if(old('serviceType',$work->serviceType)=='image')) selected @endif>تصميم الصور والاعلانات </option>
        </select>
        @error('serviceType')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="price">سعر ساعة العمل</label>
        <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" id="price" value="{{old('price',$work->price)}}">
        @error('price')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    @if($work->serviceType == 'Web Design' || $work->serviceType == 'Web Programming'|| $work->serviceType == 'App Design' || $work->serviceType == 'App Programming')
    <div class="form-group is-invalid link" id="link">
        <label for="lin">رابط الموقع </label>
        <input type="url" name ='link' class="form-control @error('link') is-invalid @enderror"  value="@if($work->web) {{old('link',$work->web->link)}} @endif  @if($work->app) {{old('link',$work->app->link)}} @endif" id="lin">
        @error('link')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    @endif

    @if($work->serviceType == 'Web Design' || $work->serviceType == 'Web Programming' || $work->serviceType == 'App Design' || $work->serviceType == 'App Programming' || $work->serviceType == 'Logo' || $work->serviceType == 'Visual Identity' )
    <div class="form-group image" id="image">
        <label for="img">صور عن العمل</label>
        <div>
        <label for ="img" button type="image" class="btn btn-secondary"> اختار الملف</label>
        <input type="file" name="image"  style="visibility: hidden;"  class=" form-control @error('image') is-invalid @enderror" id="img" >
        </div>

        @if($work->logo->first())
        <img src=" {{ asset('storage/'. $work->logo->first()->image) }}" width="200">
        @endif

        @if($work->web)
        <img src=" {{ asset('storage/'. $work->web->image) }}" width="200">
        @endif

        @if($work->app)
        <img src=" {{ asset('storage/'. $work->app->image) }}" width="200">
        @endif


        @error('image')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    @endif


    @if($work->serviceType == 'Motion Graphics')
         <div class="form-group video" id="video">
        <label for="vid">رابط الفيديو </label>
        <div>
        @if($work->serviceType == 'Motion Graphics')
        <input type="url"  name="video" class=" form-control @error('video') is-invalid @enderror" value="{{old('video',$work->motion->path)}}" id="vid" >
        @endif


        </div>
        @error('video')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    @endif


    <input type="submit" class="bt btn btn btn-outline-primary" style="font-family:Lemonada;" style="font-weight:bold;" value="تعديل">

</form>


<script>

    var m = document.getElementById('image');
    var vi = document.getElementById('video');
    var l = document.getElementById('link');

    var mm = document.getElementById('img');
    var vid = document.getElementById('vid');
    var li = document.getElementById('lin');

    m.style.display = "block";
    vi.style.display = "none";
    l.style.display = "none";

   function myfunction(){

     var x = document.getElementById('serviceType').value;

       if(x == 1){
        vi.style.display = "block";
        m.style.display = "none";
        l.style.display = "none";

        vid.setAttribute("name","video");
        li.removeAttribute("name");
        mm.removeAttribute("name");
        }
        else if( x == 2 || x == 3 ){
            m.style.display = "block";
            vi.style.display = "none";
            l.style.display = "none";


            mm.setAttribute("name","image");
            li.removeAttribute("name");
            vid.removeAttribute("name");

        }
        else if(x == 4 || x == 5 || x == 6 || x == 7){
            m.style.display = "block";
            l.style.display = "block";
            vi.style.display = "none";

            mm.setAttribute("name","image");
            li.setAttribute("name","link");
            vi.removeAttribute("name");

        }  else if(x == 8){
            m.style.display = "block";
        vi.style.display = "none";
        l.style.display = "none";

        mm.setAttribute("name","image");
        li.removeAttribute("name");
        vid.removeAttribute("name");
        }

        else if(x == 9){
            m.style.display = "block";
        vi.style.display = "none";
        l.style.display = "none";

        mm.setAttribute("name","image");
        li.removeAttribute("name");
        vid.removeAttribute("name");
        }


   }



</script>


@endsection
