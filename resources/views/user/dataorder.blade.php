@extends('layouts.home')
@section('content')
@php
  $title ='بيانات الطلب';
@endphp

<link href="/css/data.css" rel="stylesheet" media="all">
<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css'>
<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js'></script>
<link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>

<style>
    body{
        direction: rtl;
    text-align: right;
    }
    .mt-5, .my-5 {
    margin-top: 0rem!important;
}

.pl-5, .px-5 {
    padding-top: 11rem!important;
}
h2{
    color: #fff;
}

.container {
     height: 100%; 
}
</style>

<main style=" direction: rtl;
text-align: right;" style="background-color: #4A3274;">

<div class="container mt-5 px-5" style="background-color: #4A3274; margin-top:0rem; direction: rtl;
text-align: right;">
    <div class="mb-4">
        <h2>بيانات الطلب</h2>
    </div>
    <div class="row" style="margin-top: 7%">
        <div class="col-md-8" style="transform: translate(0%,0%)">
            <div class="card p-3">
                <div class="inputbox mt-3">
                    <label>رقم الطلب </label>
                <input type="text" name="name" value="{{$order->id}}" disabled class="form-control" required="required"></div>
                <div class="inputbox mt-3">
                    <label>عنوان الطلب</label>
                <input type="text" name="name" value="{{$order->name}}" disabled class="form-control" required="required"></div>

                <div class="inputbox mt-3">
                    <label>نوع الخدمة</label>
                <input type="text" name="name" value="@if($order->serviceType == 'Logo')لوقو @endif @if($order->serviceType == 'Motion Graphics') فيديو موشن جرافيكس @endif @if($order->serviceType == 'Visual Identity') هوية بصرية @endif @if($order->serviceType == 'Voice-over') تعليق صوتي @endif @if($order->serviceType == 'Web Design')تصميم مواقع الانترنت @endif @if($order->serviceType == 'Web Programming') برمجة مواقع الانترنت @endif @if($order->serviceType == 'App Design') تصميم تطبيقات الهاتف المحمول @endif @if($order->serviceType == 'App Programming') برمجة تطبيقات الهاتف المحمول @endif

                " disabled class="form-control" required="required"></div>

                <div class="inputbox mt-3">
                    <label>وصف الطلب</label>
                <input type="text" name="name" value="{{$order->description	}}" disabled class="form-control" required="required"></div>

                <div class="inputbox mt-3">
                    <label>السعر الكلي للخدمة</label>
                <input type="text" name="name" value="$ {{$order->priceOrder}}" disabled class="form-control" required="required"></div>

                <div class="inputbox mt-3">
                    <label> المدفوعات</label>
                <input type="text" name="name" value="$ {{$order->payments}}" disabled class="form-control" required="required"></div>

                <div class="inputbox mt-3">
                    <label> الباقي من سعر الطلب</label>
                <input type="text" name="name" value="$ {{$order->priceOrder - $order->payments}}" disabled class="form-control" required="required"></div>


                <div class="inputbox mt-3">
                    <label>حالة الطلب</label>
                <input type="text" name="name" value="{{$order->status}}" disabled class="form-control" required="required"></div>


                <div class="inputbox mt-3">
                    <label>قيمة الدفعة الحالية</label>
                <input type="text" name="name" value="$ {{$order->bill}}" disabled class="form-control" required="required"></div>


            </div>
            <div class="mt-4 mb-4 d-flex justify-content-between">
            <form method="POST" action="{{route("user.checkout",[$order->id])}}">
                @csrf
                <button class="btn btn-success px-3">ادفع  {{$order->bill}}$</button>
                </form>
             </div>
        </div>
        <div class="col-md-4" style="transform: translate(0%,0%)">
            <div class="card card-blue p-3 text-white mb-3"> <span>قيمة الدفعة الحالية</span>
                <div class="d-flex flex-row align-items-end mb-3">
                <h1 class="mb-0" style="color: #fff">$ {{$order->bill}}</h1> <span></span>

            </div>
        </div>
    </div>
</div>

</main>

@endsection