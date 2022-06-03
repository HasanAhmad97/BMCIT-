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


<form method='post' action="{{route('team.store')}}" enctype="multipart/form-data" class="formCreat">
    @csrf
    <div class="text">اضافة عضو جديد</div>
    <div class="form-group is-invalid">
        <label for="exampleInputEmaill">اسم العضو </label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmaill" value="{{old('name')}}">
        @error('name')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="description">المسمى الوظيفي للعضو الجديد</label>
        <textarea name="occupation" class="form-control  @error('description') is-invalid @enderror" id="description">{{old('description')}}</textarea>
        @error('description')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>


    <div class="form-group is-invalid link" id="link">
        <label for="lin">رابط الموقع </label>
        <input type="url" name="link" class="form-control @error('link') is-invalid @enderror"  value="{{old('link')}}" id="lin">
        @error('link')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group image" id="image">
        <label for="img">صور للعضو الجديد </label>
        <div>
        <label for ="img" button type="image" class="btn btn-secondary"> اختار الملف</label>
        <input type="file" name="image" style="visibility: hidden;"  class=" form-control @error('image') is-invalid @enderror" id="img" >
        </div>
        @error('image')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>


    <p id="a"></p>

    <button type="submit" class="bt btn btn btn-outline-primary" style="font-family:Lemonada;" style="font-weight:bold;">انشاء</button>

</form>



@endsection
