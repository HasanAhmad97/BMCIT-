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


<form method='post' action="{{route('team.update',[$team->id])}}" enctype="multipart/form-data" class="formCreat">
    @csrf
    <div class="text">تعديل {{$team->name}}</div>
    <div class="form-group is-invalid">
        <label for="exampleInputEmaill">اسم العضو </label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmaill" value="{{old('name',$team->name)}}">
        @error('name')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="occupation">المسمى الوظيفي للعضو </label>
        <textarea name="occupation" class="form-control  @error('occupation') is-invalid @enderror" id="occupation">{{old('occupation',$team->occupation)}}</textarea>
        @error('occupation')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>


    <div class="form-group is-invalid link" id="link">
        <label for="lin">رابط الموقع </label>
        <input type="url" name="link" class="form-control @error('link') is-invalid @enderror"  value="{{old('link',$team->link)}}" id="lin">
        @error('link')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group image" id="image">
        <label for="img">صورة للعضو  </label>
        <div>
        <label for ="img" button type="image" class="btn btn-secondary"> اختار الصورة</label>
        <input type="file" name="image" style="visibility: hidden;"  class=" form-control @error('image') is-invalid @enderror" id="img" >
        </div>
        @error('image')
        <p class="text-danger">{{ $message }}</p>
        @enderror

        <img src=" {{ asset('storage/'. $team->image) }}" width="200">
    </div>



    <input type="submit" class="bt btn btn btn-outline-primary" style="font-family:Lemonada;" style="font-weight:bold;" value="تعديل">

</form>



@endsection
