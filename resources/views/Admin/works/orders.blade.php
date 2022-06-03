@extends('layouts.admin')
@section('content')

@php
    $title = "جميع الطلبات";
    $color = '#fff';
@endphp

@if(session('stuteEr'))
<div class="alert alert-danger al" style="transform: translate(26%,-32%);">{{ session('stuteEr') }} </div>
@endif

<div class="row">
    <div class="col-lg-9">
        <h2 class="title-1 m-b-25">جدول الطلبات</h2>
        <div class="table-responsive table--no-card m-b-40">
            <table class="table table-borderless table-striped table-earning">
                <thead>
                    <tr>
                        <th>التاريخ </th>
                        <th>رقم الطلب</th>
                        <th>اسم الشخص</th>
                        <th>الدولة</th>
                        <th>الايميل</th>
                        <th>الهاتف</th>
                        <th>عنوان الطلب</th>
                        <th>نوع الخدمة</th>
                        <th>الوصف </th>
                        <th>الميزانية</th>
                        <th>السعر</th>
                        <th>الحالة </th>
                        <th>  تحديد سعر الطلب</th>
                        <th>تغير الحالة </th>
                        <th>حذف الطلب</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)

                    @foreach($order->notifications as $no)

                    @php
                    $no->markAsRead();
                    @endphp

                    @endforeach
                    <tr>
                        <td>{{$order->created_at}}</td>
                        <td>{{ $order->id}}</td>
                        <td>{{ $order->name}}</td>
                        <td>{{ $order->country}}</td>
                        <td>{{$order->link}}</td>
                        <td>{{$order->phone}}</td>
                        <td>{{ $order->order_name}}</td>
                        <td class="text-right">{{ $order->serviceType}}</td>
                        <td style="  white-space:unset;">{{ $order->description}}</td>
                        <td class="text-right">{{ $order->price}}$</td>
                        <td class="text-right">{{ $order->priceOrder}}$</td>

                        <td>
                            @if($order->status == 'مكتمل')
                            <div class="p-3 mb-2 bg-success text-white">{{$order->status}}<div>
                            @endif

                            @if($order->status == 'غير مكتمل')
                            <div class="p-3 mb-2 bg-warning text-white">{{$order->status}}<div>
                            @endif

                            </td>

                        <td><form method="POST" action="{{route('user.priceOrder',[$order->id])}}">
                            @csrf
                            <label>ادخل سعر الطلب</label>
                            <input type="number" name="priceOrder" class="form-control au-input au-input--full">
                            <button class="btn btn-dark-green" style="display: inline-block">ارسال</button>
                        </form>
                        </td>


                        <td><form method="POST" action="{{route('order.status',[$order->id])}}">
                            @csrf
                            <label>ادخل حالة الطلب</label>
                            <select name="status" id="status" class="form-control cc-name vali fontawesome-select @error('status') is-invalid @enderror">
                                <option >---------</option>
                                <option value="1">غير مكتمل</option>
                                <option value="2">مكتمل </option>
                            </select>
                            <button class="btn btn-dark-green" style="display: inline-block">تغير</button>
                        </form>
                        </td>


                        <td><form method="POST" action="{{route('order.delete',[$order->id])}}">
                            @csrf
                            <button class="btn btn-danger" style="display: inline-block">حذف</button>
                        </form>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
