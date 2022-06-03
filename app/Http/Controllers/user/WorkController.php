<?php

namespace App\Http\Controllers\User;

use App\Models\Team;
use App\Models\Work;
use App\Models\Video;
use App\Models\Voice;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Notifications\newMessageNotification;

class WorkController extends Controller
{
    //


    public function indexMotion()
    {
            $works = work::where('serviceType', 'Motion Graphics')->get();
            return view('user.indexMotion',[
                    'works'=>$works,
                    ]);
    }

    public function indexLogo()
    {
            $img = [];
            $works = Work::where('serviceType', 'Logo')
                    ->get();

            foreach ($works as $work) {
                    $images = $work->images;
                    $img[] =  $images;
            }


            return view('user.indexLogo', [
                    'works' => $works,
                    'images' => $img
            ]);
    }

    public function indexId()
    {
            $img = [];
            $works = Work::where('serviceType', 'Visual Identity')
                    ->get();

            foreach ($works as $work) {
                    $images = $work->images;
                    $img[] =  $images;
            }


            return view('user.indexId', [
                    'works' => $works,
                    'images' => $img
            ]);
    }

    public function indexUi()
    {
            $img = [];
            $works = Work::where('serviceType', 'ux/ui')
                    ->get();
            foreach ($works as $work) {
                    $images = $work->images;
                    $img[] =  $images;
            }


            return view('user.indexUi', [
                    'works' => $works,
                    'images' => $img
            ]);
    }

    public function indexImage()
    {
            $img = [];
            $works = Work::where('serviceType', 'image')
                    ->get();
            foreach ($works as $work) {
                    $images = $work->images;
                    $img[] =  $images;
            }


            return view('user.indexImage', [
                    'works' => $works,
                    'images' => $img
            ]);
    }



    public function indexWeb()
    {
            $works = Work::where('serviceType', 'Web Design')
                    ->orWhere('serviceType', 'Web Programming')
                    ->get();

            return view('user.indexWeb',[
                    'works' => $works,
            ]);
    }

    public function indexApp()
    {
            $works = Work::where('serviceType', 'App Programming')
                    ->orWhere('serviceType', 'App Design')
                    ->get();

                    return view('user.indexApp',[
                            'works' => $works,
                    ]);
            }


            public function storeMessage(Request $request)
        {

                $message = Message::create([
                        "name" => $request->name,
                        "subject" => $request->subject,
                        "message" => $request->message,
                        "email" => $request->email,
                ]);

                $message->notify(new newMessageNotification($message));


                return 'تم ارسال رسالتك بنجاح وسيتم التواصل معك في اقرب وقت شكرا لثقتك بنا';
        }


        public function userTeam(){

            $teams = Team::all();

                    return view('user.indexTeam',[
                            'teams' => $teams,
                    ]);
        }

}
