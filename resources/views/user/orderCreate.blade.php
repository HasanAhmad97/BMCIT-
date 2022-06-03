@extends('layouts.home')
@section('content')

<script>
    b = document.getElementById('body');
    b.style.background = "#4A3274";
</script>

@php
    $title = 'تقديم طلب خدمة';
@endphp
<div class="row d-flex justify-content-center">
<div class=" col-md-6 col-12 orderCraete">

    <div class="card-header" style="margin-top: 5.1rem">تقديم طلب خدمة جديدة</div>
    <div class="card-body">
        <div class="card-title">
            <h3 class="text-center title-2">طلب خدمة</h3>
        </div>
        <hr>

        @if($errors->any())
    <div class="alert alert-danger er container" id="close">
    @foreach($errors->all() as $error)
    <p>{{$error}}</p>
    @endforeach
    </div>
@endif
    <form action="{{route('order.store')}}" method="post" novalidate="novalidate">
        @csrf

        <div class="form-group">
            <label for="cc-payment" class="control-label mb-1">الاسم</label>
            <input id="name" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="الاسم">
            @error('name')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group" id="mail">
            <label for="email" class="control-label mb-1">الايميل </label>
            <input id="email" name="email" type="text" class="form-control cc-number identified visa" value="" placeholder="example@gmail.com">
            @error('email')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>


        <div class="form-group">
            <label for="cc-payment" class="control-label mb-1">الدولة</label>
            <input id="country" name="country" type="text" class="form-control" aria-required="true" aria-invalid="false">
            @error('country')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="cc-payment" class="control-label mb-1">رقم الهاتف</label>
            <input id="phone" name="phone" type="tel" class="form-control" aria-required="true" aria-invalid="false">
            @error('phone')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">عنوان الطلب</label>
                <input id="orderName" name="orderName" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="العنوان">
                @error('orderName')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>


            <div class='form-group has-success'>
                <label for="serviceType" class="control-label mb-1">نوع الخدمة</label>
                <select name="serviceType" id="serviceType"  onchange='myfunctionPrice()' class="form-control cc-name vali fontawesome-select @error('serviceType') is-invalid @enderror">
                    <option >---------</option>
                    <option value="1"> موشن جرافيك</option>
                    <option value="2">الشعارات </option>
                    <option value="3">الهوية البصرية </option>
                    <option value="4">تصميم المواقع</option>
                    <option value="5">برمجة المواقع </option>
                    <option value="6">تصميم التطبيقات </option>
                    <option value="7">برمجة التطبيقات </option>
                    <option value="8">UI/UX </option>
                    <option value="9">تصميم الصور والاعلانات </option>
                    <option value="10">  التسويق الرقمي SEO</option>
                </select>
                @error('serviceType')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group has-success">
                <label for="description" class="control-label mb-1">وصف مفصل عن الخدمة </label>
                <textarea id="description" name="description" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card"
                    autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error"> </textarea>
                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                @error('description')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>


            <div class='form-group has-success' id="yourprice">
                <label  class="control-label mb-1">الميزانية ($)</label>
                <select  id="nothing"  class="form-control cc-name vali fontawesome-select @error('price-web') is-invalid @enderror">
                    <option >---------</option>
                </select>
            <select  id="p_logo"  onchange='functionprice()' class="form-control cc-name vali fontawesome-select @error('price-logo') is-invalid @enderror">
                <option value="50-100"> 50-100$</option>
                <option value="100-300"> 100-300$</option>
                <option value="300-500"> 300-500$  </option>
                <option value="16" style="color:red"> مخصص  </option>
            </select>

            @error('p_logo')
                <p class="text-danger">{{ $message }}</p>
                @enderror

            <select  id="p_motion"  onchange='functionprice()' class="form-control cc-name vali fontawesome-select @error('price-motion') is-invalid @enderror">
                <option value="200-400"> 200-400$</option>
                <option value="400-800"> 400-800$</option>
                <option value="800-1200"> 800-1200$</option>
                <option value="16" style="color:red"> مخصص  </option>
            </select>

            @error('p_motion')
                <p class="text-danger" >{{ $message }}</p>
                @enderror

            <select  id="p_web"  onchange='functionprice()' class="form-control cc-name vali fontawesome-select @error('price-web') is-invalid @enderror">
                <option value="300-500"> 300-500$</option>
                <option value="500-1000"> 500-1000$</option>
                <option value="1000-2000"> 1000-2000$</option>
                <option value="16" style="color:red"> مخصص  </option>
            </select>
            @error('p_web')
                <p class="text-danger">{{ $message }}</p>
                @enderror

            <select  id="p_voice" name="priceVoice" onchange='functionprice()' class="form-control cc-name vali fontawesome-select @error('price-voice') is-invalid @enderror">
                <option value="50-100"> 50-100$</option>
                <option value="100-200"> 100-200$<li class="fa fa-facebook"></li></option>
                <option value="200-300"> 200-300$ <li class="fa fa-facebook"></li> </option>
                <option value="16" style="color:red"> مخصص  </option>
            </select>
            @error('p_voice')
            <p class="text-danger">{{ $message }}</p>
            @enderror

            <select  id="p_app"  onchange='functionprice()' class="form-control cc-name vali fontawesome-select @error('price-app') is-invalid @enderror">
                <option value="1000-2000"> 1000-2000$</option>
                <option value="2000-3000"> 2000-3000$</li></option>
                <option value="3000-5000"> 3000-5000$</li> </option>
                <option value="16" style="color:red"> مخصص  </option>
            </select>

            @error('p_app')
                <p class="text-danger">{{ $message }}</p>
                @enderror

            </div>

            <div class="form-group" id="pri">
                <label for="price" class="control-label mb-1">ادخل قيمة الميزانية التي تريدها </label>
                <input id="price" type="text" class="form-control cc-number identified visa" value="">
                @error('price')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>



                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                    <i class="fa fa-lock fa-lg"></i>&nbsp;
                    <span id="payment-button-amount">ارسال الطلب </span>
                    <span id="payment-button-sending" style="display:none;">Sending…</span>
                </button>
            </div>
        </form>
    </div>
</div>

</div>


<script>



    var no = document.getElementById('nothing');
    var  p_logo = document.getElementById('p_logo');
    var p_motion = document.getElementById('p_motion');
    var p_web = document.getElementById('p_web');
    var p_app = document.getElementById('p_app');
    var p_voice = document.getElementById('p_voice');


    var pri = document.getElementById('pri');
    var p = document.getElementById('price');
    var yprice = document.getElementById('yourprice');


    p_logo.style.display = "none";
    p_motion.style.display = "none";
    p_web.style.display = "none";
    p_app.style.display = "none";
    p_voice.style.display = "none";

    pri.style.display = "none";

   function myfunctionPrice(){

     var x = document.getElementById('serviceType').value;


       if(x == 1){
        p_motion.style.display = "block";
        yprice.style.display = "block";
        p_web.style.display = "none";
        p_app.style.display = "none";
        p_voice.style.display = "none";
        p_logo.style.display = "none";
        no.style.display = "none";

        p_motion.setAttribute("name","price");
        p_web.removeAttribute("name");
        p_app.removeAttribute("name");
        p_voice.removeAttribute("name");
        p_logo.removeAttribute("name");

        pri.style.display = 'none';
           p.removeAttribute("name");
        }
        else if( x == 2 || x == 3 ){
            yprice.style.display = "block";
            p_motion.style.display = "none";
        p_web.style.display = "none";
        p_app.style.display = "none";
        p_voice.style.display = "none";
        p_logo.style.display = "block";
        no.style.display = "none";


        p_logo.setAttribute("name","price");
        p_web.removeAttribute("name");
        p_app.removeAttribute("name");
        p_voice.removeAttribute("name");
        p_motion.removeAttribute("name");

        pri.style.display = 'none';
           p.removeAttribute("name");

        }


   else if( x == 4 || x == 5 ){
    yprice.style.display = "block";
            p_motion.style.display = "none";
        p_web.style.display = "block";
        p_app.style.display = "none";
        p_voice.style.display = "none";
        p_logo.style.display = "none";
        no.style.display = "none";

        p_web.setAttribute("name","price");
        p_voice.removeAttribute("name");
        p_app.removeAttribute("name");
        p_logo.removeAttribute("name");
        p_motion.removeAttribute("name");

        pri.style.display = 'none';
           p.removeAttribute("name");


   }
   else if( x == 6 || x == 7 ){
    yprice.style.display = "block";
            p_motion.style.display = "none";
        p_web.style.display = "none";
        p_app.style.display = "block";
        p_voice.style.display = "none";
        p_logo.style.display = "none";
        no.style.display = "none";

        p_web.removeAttribute("name");
        p_voice.removeAttribute("name");
        p_app.setAttribute("name",'price');
        p_logo.removeAttribute("name");
        p_motion.removeAttribute("name");

        pri.style.display = 'none';
           p.removeAttribute("name");


   }
   else if(x == 8 || x == 9 || x == 10){

    pri.style.display = 'block';
           p.setAttribute("name","price");

           yprice.style.display = "none";

        p_motion.style.display = "none";
        p_web.style.display = "none";
        p_app.style.display = "none";
        p_seo.style.display = "block";
        p_voice.style.display = "none";
        p_logo.style.display = "none";
        no.style.display = "none";

        p_app.removeAttribute("name");
        p_seo.setAttribute("name","price");
        p_voice.removeAttribute("name");
        p_web.removeAttribute("name");
        p_logo.removeAttribute("name");
        p_motion.removeAttribute("name");

   }
   }

   function functionprice(){

    var logo = document.getElementById('p_logo').value;
    var motion = document.getElementById('p_motion').value;
    var web = document.getElementById('p_web').value;
    var app = document.getElementById('p_app').value;
    var voice = document.getElementById('p_voice').value;
    var x = document.getElementById('serviceType').value;

       if (logo == "16" || motion == "16" || web == "16" || app == "16" || voice == "16" ){
           pri.style.display = 'block';
           p.setAttribute("name","price");


       }else {
        pri.style.display = 'none';
           p.removeAttribute("name");
       }
   }

   </script>

@endsection
