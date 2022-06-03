<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\User;
use App\Models\Order;
use App\Events\newOrder;
use App\Models\OraderUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use App\Notifications\newOrderNotification;

class OrderController extends Controller
{

    //

    public function index(){

        $order = Order::get();


        return view('admin.works.orders',[
            'orders' => $order,

        ]);
    }

    public function create(){
        return view('user.orderCreate');
    }

    public function store(Request $request){

       //return $request;

        $request->validate(
            [
                    'serviceType' => 'required|integer',
                    'description' => 'required|min:10',
                    'name' => 'required|string|max:255|min:3',
                    'orderName' => 'required|string|max:255|min:3',
                    'country' => 'required|string|max:255|min:3',
                    'email' => 'required|email',
                    'price' => 'required',
            ],
            [
                    'orderName.required' => 'حقل العنوان مطلوب',
                    'description.required' => 'هذا الحقل مطلوب',
                    'name.min' => 'هذا الاسم اقل من :min احرف',
                    'description.min' => 'هذا الوصف اقل من :min احرف',
                    'max:250' => 'الاسم طويل يجب ان لا يزيدعن :max حرف',
                    'int' => 'يجب ان تختار احدا الخيارات المتاحة',
                    'email.required' => 'حقل عنوان الايميل مطلوب',
                    'url' => 'يرجى ادخال رابط صحيح',
                    'regex' => 'يجب ان يكون المدخل أعداد',
                    'price.required' => ' حقل الميزانية مطلوب',
                    'serviceType.integer' =>' يرجا اختيار نوع الخدمة ',
                    'price.required_without_all' => 'يجب ادخال الميزانية',
                    'name.required' => 'حقل الاسم مطلوب',
                    'country.required' => 'حقل الدولة مطلوب'

            ]
    );

        DB::beginTransaction();

        try {


        $order = Order::create([
            'order_name'=>$request->orderName,
            'name'=>$request->name,
            'country'=>$request->country,
            'serviceType'=>$request->serviceType,
            'description'=>$request->description,
            'link'=>$request->email,
            'price'=>$request->price,
            'phone'=>$request->phone
            ]);

            DB::commit();
            //event(new newOrder($order));

            $order->notify(new newOrderNotification($order));

        } catch (Throwable $e) {

            DB::rollBack();
            return $e->getMessage();
        }

        return redirect()->route('user.home')->with('sccessOrder','تم ارسال طلبك بنجاح و سيتم التواصل معك في اقرب وقت
        شكرا لثقتك بنا
        ');
    }


   /* public function indexData(){
        //$user = Auth::user();
        $orders =$user->orders->first();

        foreach($user->orders as $ord){
            if($ord->bill != '0'){
                $order = $ord;
        }
    }


        return view('user.dataorder',[

            'order' => $order,
        ]);
    }*/

    public function changeStatus(Request $request, $id){

        $orderch = Order::findOrFail($id);
        $orderch->update([
            'status' => $request->status,
        ]);

        $order = Order::get();
        $message = Message::get();

        return view('Admin.works.orders',[
            'orders' => $order,
            'messages'=> $message,
        ]);
    }

}
