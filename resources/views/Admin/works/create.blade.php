@extends('layouts.admin')

@php
$title = "رفع عمل جديد";
$color = '#E5E5E5';
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


<form method='post' action="{{route('work.store')}}" enctype="multipart/form-data" class="formCreat">
    @csrf
    <div class="text">انشاء عمل جديد</div>
    <div class="form-group is-invalid">
        <label for="exampleInputEmaill">اسم العمل </label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmaill" value="{{old('name')}}">
        @error('name')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="description">وصف العمل</label>
        <textarea name="description" class="form-control  @error('description') is-invalid @enderror" id="description">{{old('description')}}</textarea>
        @error('description')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class='form-group'>
        <label for="serviceType">نوع الخدمة</label>
        <select name="serviceType" id="serviceType"  onchange='myfunction()' class="form-control co @error('serviceType') is-invalid @enderror">
            <option >---------</option>
            <option value="1"> موشن جرافيكس</option>
            <option value="2">لوقو </option>
            <option value="3">الهوية البصرية </option>
            <option value="4">تصميم المواقع</option>
            <option value="5">برمجة المواقع </option>
            <option value="6">تصميم التطبيقات </option>
            <option value="7">برمجة التطبيقات </option>
            <option value="8">UI/UX </option>
            <option value="9">تصميم الصور والاعلانات </option>
        </select>
        @error('works_id')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="price">سعر ساعة العمل</label>
        <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" id="price" value="{{old('price')}}">
        @error('price')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group is-invalid link" id="link">
        <label for="lin">رابط الموقع </label>
        <input type="url"  class="form-control @error('link') is-invalid @enderror"  value="{{old('link')}}" id="lin">
        @error('link')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group video" id="video">
        <label for="vid">رابط الفيديو </label>
        <div>
        <input type="url"   class=" form-control @error('video') is-invalid @enderror" id="vid" >
        </div>
        @error('video')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>


    <div class="form-group image" id="image">
        <label for="img">صور عن العمل</label>
        <div>
        <label for ="img" button type="image" class="btn btn-secondary"> اختار الملف</label>
        <input type="file"  style="visibility: hidden;"  class=" form-control @error('image') is-invalid @enderror" id="img" >
        </div>
        @error('image')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>



    <p id="a"></p>

    <button type="submit" class="bt btn btn btn-outline-primary" style="font-family:Lemonada;" style="font-weight:bold;">انشاء</button>

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
