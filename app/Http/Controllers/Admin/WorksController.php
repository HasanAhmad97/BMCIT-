<?php

namespace App\Http\Controllers\Admin;

use in;
use Error;
use App\Models\App;
use App\Models\Web;
use App\Models\Link;
use App\Models\Logo;
use App\Models\Team;
use App\Models\User;
use App\Models\Work;
use App\Models\Image;
use App\Models\Order;
use App\Models\Video;
use App\Models\Voice;
use App\Models\Motion;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class WorksController extends Controller
{
        public function dashbord()
        {
                $user = Auth::user();

                Artisan::call('route:cache');
                return view('Admin.works.dashbord',[
                'online_visitor' => DB::table('sessions')->count(),
                'orders_count' => DB::table('orders')->count(),
                'works_count' => DB::table('works')->count(),
                'orders' => Order::all(),
                'users' => User::get(),
                'messages'=> Message::get(),
                ]);
        }

        public function indexOrders(){

                $order = Order::all();
                return view('Admin.works.orders',[
                        'orders' => Order::all(),
                        'messages'=> Message::get(),
                ]);
        }

        public function indexMotion()
        {
                $works = work::where('serviceType', 'Motion Graphics')->get();

                return view('Admin.works.indexMotion',[
                        'works'=>$works,
                        'orders' => Order::get(),
                        'messages'=> Message::get(),

                        ]);
        }

        public function indexLogo()
        {
                $works = Work::where('serviceType', 'Logo')
                        ->orWhere('serviceType', 'Visual Identity')
                        ->get();


                return view('Admin.works.indexLogo', [
                        'works' => $works,
                        'orders' => Order::get(),
                        'messages'=> Message::get(),
                ]);
        }

        public function indexUi()
        {
                $works = Work::where('serviceType', 'ux/ui')
                        ->get();


                return view('Admin.works.indexLogo', [
                        'works' => $works,
                        'orders' => Order::get(),
                        'messages'=> Message::get(),
                ]);
        }

        public function indexImage()
        {
                $works = Work::where('serviceType', 'image')
                        ->get();


                return view('Admin.works.indexLogo', [
                        'works' => $works,
                        'orders' => Order::get(),
                        'messages'=> Message::get(),
                ]);
        }



        public function indexVoice()
        {

                $works = work::where("serviceType", "Voice-over")->get();

                return view('Admin.works.indexVoice', [

                        'works' => $works,
                        'orders' => Order::get(),
                        'messages'=> Message::get(),
                ]);
        }

        public function indexWeb()
        {
                $works = Work::where('serviceType', 'Web Design')
                        ->orWhere('serviceType', 'Web Programming')
                        ->get();


                return view('Admin.works.indexWeb',[
                        'works' => $works,
                        'orders' => Order::get(),
                        'messages'=> Message::get(),
                ]);
        }

        public function indexApp()
        {
                $works = Work::where('serviceType', 'App Programming')
                        ->orWhere('serviceType', 'App Design')
                        ->get();

                        return view('Admin.works.indexApp',[
                                'works' => $works,
                                'orders' => Order::get(),
                                'messages'=> Message::get(),
                        ]);
                }



        //show
        public function create()
        {
                return view('Admin.works.create',[

                    'orders' => Order::get(),
                        'messages'=> Message::get(),
                ]);
        }

        //create in DataBase
        public function store(Request $request)

        {
                $request->validate(
                        [
                                'serviceType' => 'required|int',
                                'name' => 'required|string|max:255|min:3',
                                'description' => 'nullable|string|max:2000',
                                'video' => 'required_if:serviceType,1|nullable|url',
                                'image.*' => 'required_if:serviceType,2|required_if:serviceType,3|required_if:serviceType,5|required_if:serviceType,6|required_if:serviceType,7|required_if:serviceType,8|mimes:jpeg,jpg,png,gif',
                                'link' => 'required_if:serviceType,4|required_if:serviceType,5|required_if:serviceType,6|required_if:serviceType,7|url',
                                'voice' => 'required_without_all:video,image',
                                'price' => 'regex:/^\d+(\.\d{1,2})?$/|nullable',
                                'lang' => 'required_if:serviceType,4|',
                                'gender' =>['required_if:serviceType,4', Rule::in([1,2])],
                        ],
                        [
                                'required' => 'هذا الحقل مطلوب',
                                'min' => 'هذا الاسم اقل من :min احرف',
                                'max:2000' => 'هذا الوصف كبير جدا',
                                'max:250' => 'الاسم طويل يجب ان لا يزيدعن :max حرف',
                                'integer' => 'يجب ان تختار احدا الخيارات المتاحة',
                                'video.required_if' => 'حقل ملف الفيديو مطلوب',
                                'gender.required_if' => 'حقل نوع الصوت مطلوب',
                                'image.required_if' => 'حقل ملف الصور مطلوب',
                                'voice.required_if' => 'حقل ملف الصوت مطلوب',
                                'link.required_if' => 'رابط الموقع مطلوب لهذه الخدمة',
                                'voice.mimes' => 'يرجا ادخال ملف صوتي',
                                'video.mimes' => 'يرجا رفع ملف باحدا صيغة الفيديو',
                                'image.mimes' =>  'يرجا رفع ملف باحدا صيغة الصور',
                                'url' => 'يرجى ادخال رابط صحيح',
                                'required_without' => 'يجب ادخال ملف الفيديو او ملف صوت',
                                'regex' => 'يجب ان يكون المدخل أعداد',
                                'voice.required_without_all' => 'يجب ان ترفع (فيديو او صوت او صورة )',
                                'gender.in' => ' يرجا ادخال ادخال صحيح في حقل نوع الصوت',



                        ]
                );


                $work = Work::create($request->except('image', 'video', 'voice', 'link','lang','pdf','gender'));

                if($request->serviceType == 1){
                        Motion::create([
                                'path' => $request->video,
                                'work_id' => $work->id,
                        ]);
                }

                if($request->serviceType == 2 || $request->serviceType == 3 || $request->serviceType == 8 || $request->serviceType == 9){

                        $image = $request->file('image')->store('image', 'public');



                                Logo::create([
                                        'work_id'=> $work->id,
                                        'image' => $image,
                                ]);
        }


                if ($request->serviceType == 4 || $request->serviceType == 5) {

                        $link = $request->link;

                        $path = $request->file('image')->store('image', 'public');

                        Web::create([
                                'work_id' => $work->id,
                                'link' => $link,
                                'image' => $path,
                        ]);
                }

                if ($request->serviceType == 6 || $request->serviceType == 7) {

                        $link = $request->link;

                        $path = $request->file('image')->store('image', 'public');

                        App::create([
                                'work_id' => $work->id,
                                'link' => $link,
                                'image' => $path,
                        ]);
                }
                return back()->with('sccess', " تم انشاء العمل بنجاح");
        }



        //show
        public function edit($id)
        {
                $work = Work::findOrFail($id);


                return view('Admin.works.edit', [
                        'work' =>  $work,
                        'orders' => Order::get(),
                        'messages'=> Message::get(),

                ]);
        }

        //edit on DataBase
        public function update(Request $request, $id)
        {


                $request->validate(
                        [
                                'serviceType' => 'required|int',
                                'name' => 'required|string|max:255|min:3',
                                'description' => 'nullable|string|max:2000',
                                'video' => 'required_if:serviceType,1',
                                'image.*' => 'required_if:serviceType,2|required_if:serviceType,3|required_if:serviceType,5|required_if:serviceType,6|required_if:serviceType,7|required_if:serviceType,8|mimes:jpeg,jpg,png,gif',
                                'link' => 'required_if:serviceType,4|required_if:serviceType,5|required_if:serviceType,6|required_if:serviceType,7|url',
                                'price' => 'regex:/^\d+(\.\d{1,2})?$/|nullable',
                                'lang' => 'required_if:serviceType,4|',
                        ],
                        [
                                'required' => 'هذا الحقل مطلوب',
                                'min' => 'هذا الاسم اقل من :min احرف',
                                'max:2000' => 'هذا الوصف كبير جدا',
                                'max:250' => 'الاسم طويل يجب ان لا يزيدعن :max حرف',
                                'int' => 'يجب ان تختار احدا الخيارات المتاحة',
                                'video.required_if' => 'حقل ملف الفيديو مطلوب',
                                'image.required_if' => 'حقل ملف الصور مطلوب',
                                'voice.required_if' => 'حقل ملف الصوت مطلوب',
                                'link.required_if' => 'رابط الموقع مطلوب لهذه الخدمة',
                                'voice.mimes' => 'يرجا ادخال ملف صوتي',
                                'video.mimes' => 'يرجا رفع ملف باحدا صيغة الفيديو',
                                'image.mimes' =>  'يرجا رفع ملف باحدا صيغة الصور',
                                'url' => 'يرجى ادخال رابط صحيح',
                                'regex' => 'يجب ان يكون المدخل أعداد',
                                'serviceType.int'=>'يجب ان تختار احد انواع الخدمة',

                        ]
                );

                $work  = Work::findOrFail($id);
                $work->update($request->except('image', 'video', 'voice', 'link','path','gender','lang','pdf'));

                if ($request->hasFile('image')) {
                        if($work->serviceType == 2 || $work->serviceType == 3 || $work->serviceType == 8 || $work->serviceType == 9 ){

                                $path = $request->file('image')->store('image', 'public');

                                $work->logo->first()->update([
                                        'image' => $path,
                                ]);
                        }

                        if($work->serviceType == 4 || $work->serviceType == 5){
                                $path = $request->file('image')->store('image', 'public');

                                $work->web->update([
                                        'image' => $path,
                                ]);
                        }

                        if($work->serviceType == 6 || $work->serviceType == 7){
                                $path = $request->file('image')->store('image', 'public');

                                $work->app->update([
                                        'image' => $path,
                                ]);
                        }

                }

                if ($request->video) {
                        if($work->serviceType == 1){
                                $work->motion()->update([
                                'path' => $request->video,
                        ]);
                        }
                        if( $work->serviceType == 4 ){
                                $work->voice()->update([
                                'video' => $request->video,
                                ]);
                        }
                }

                if ($request->hasFile('voice')) {

                        $path = $request->file('voice')->store('voice', 'public');


                               $work->voice->update([
                                        'voice' => $path,
                               ]);
                }


                if ($request->link) {

                        if($work->serviceType == 5 || $work->serviceType == 6){

                                $work->web->update([
                                        'link' => $request->link,
                                ]);
                        }

                        if($work->serviceType == 7 || $work->serviceType == 8){

                                $work->app->update([
                                        'link' => $request->link,
                                ]);
                        }

        }

        return redirect()->back()->with('sccess', "تم التعديل بنجاح");
}


        public function delete($id)
        {

                $work = Work::findOrFail($id);

                //return $work->logo;
                $logo = $work->logo;
                $motion = $work->motion;
                $web = $work->web;
                $app = $work->app;
               if ($logo->first()) {
                        Storage::disk('public')->delete($logo->first()->image);
                                $logo->first()->delete();
                }
                elseif($motion){
                                $motion->delete();
                }

                elseif($web){
                    $web->delete();
                }

                elseif($app){
                    $app->delete();
                }


                $work->delete();


                return redirect()
                       ->back()
                        ->with('sccess', "Work {$work->name} delete!");
        }

        public function index()
        {

                $videos = Motion::inRandomOrder()->limit(3)->get(['path']);

                $logo = Work::where('serviceType','Logo')->orWhere('serviceType','Visual Identity')->inRandomOrder()->limit(3)->get();
                $web = Work::where('serviceType','Web Design')->orWhere('serviceType','Web Programming')->inRandomOrder()->limit(3)->get();
                $app = Work::where('serviceType','App Design')->orWhere('serviceType','App Programming')->inRandomOrder()->limit(3)->get();
                $ui = Work::where('serviceType','ux/ui')->inRandomOrder()->limit(3)->get();
                $image = Work::where('serviceType','image')->inRandomOrder()->limit(3)->get();
                $teams = Team::take(4)->get();
                return view('index',[

                    'orders' => Order::get(),
                        'videos' => $videos,
                        'web' => $web,
                        'app' => $app,
                        'logo' => $logo,
                        'image' => $image,
                        'ui' => $ui,
                        'teams' => $teams,

                ]);
        }

        public function storeBall(Request $request,$id){

                $order =Order::findOrFail($id);

                if($order->status == 'مكتمل'){
                     return back()->with('stuteEr','جميع الدفعات مكتملة لهذا الطلب ');
                }

                $order->update([
                        'bill' => $request->bill,
                ]);

                return back();

        }

        public function storePriceOrder(Request $request,$id){

                $order = Order::where('id',$id)->first();

                $order->update([
                        'priceOrder' => $request->priceOrder,
                ]);

                return back();

        }

        public function indexMessage(){
                $message = Message::get();

                return view('Admin.works.indexMessage',[
                        'messages' => $message,
                        'orders' => Order::get(),
                ]);
        }

        public function orderDelete(Request $request,$id){

                $order =Order::findOrFail($id);
                $order->delete();

                return back();
        }



}
