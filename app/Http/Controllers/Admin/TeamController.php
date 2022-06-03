<?php

namespace App\Http\Controllers\Admin;

use App\Models\Team;
use App\Models\User;
use App\Models\Order;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeamController extends Controller
{

    public function indexTeam(){

        $team = Team::all();
        return view('Admin.team.indexTeam',[
                'teams' =>$team,
                'orders' => Order::get(),
                'messages'=> Message::get(),
        ]);
}

    public function create()
        {
                return view('Admin.team.create',[

                    'orders' => Order::get(),
                        'messages'=> Message::get(),
                ]);
        }

        //create in DataBase
        public function store(Request $request)

        {
                $request->validate(
                        [
                            'name' => 'required',
                            'occupation' => 'required',
                            'link' => 'required',
                            'image' => 'required',
                        ],
                        [
                            'name.required' => "حقل الاسم مطلوب",
                            'occupation.required' => "حقل المسمى الوظيفي مطلوب",
                            'link.required' => 'حقل رابط الصفحة الشخصية على موقع linked مطلوب',
                            'image.required' => 'حقل الصورة مطلوب'
                        ]
                );

                $path = $request->file('image')->store('imageTeam', 'public');

                $team = Team::create([
                    'name' => $request->name,
                    'occupation' => $request->occupation,
                    'link' => $request->link,
                    'image' => $path,
                ]);

                return back()->with('sccess', " تم اضافة العضو بنجاح");


        }



        //show
        public function edit($id)
        {
                $team = Team::findOrFail($id);


                return view('Admin.team.edit', [
                        'team' =>  $team,
                        'orders' => Order::get(),
                        'messages'=> Message::get(),

                ]);
        }

        //edit on DataBase
        public function update(Request $request, $id)
        {

                $team  = Team::findOrFail($id);
                $team->update($request->except('image'));

                if($request->hasFile('image')){
                    $path = $request->file('image')->store('imageTeam', 'public');
                    $team->update([
                        'image' => $path,
                    ]);
                }

        return redirect()->back()->with('sccess', "تم التعديل بنجاح");
}


        public function delete($id)
        {

                $team = Team::findOrFail($id);
                $team->delete();


                return redirect()
                       ->back()
                        ->with('sccess', "Work {$team->name} delete!");
        }
}
