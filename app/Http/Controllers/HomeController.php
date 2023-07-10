<?php

namespace App\Http\Controllers;

use App\Models\BloodMoney;
use App\Models\Box;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->type == 1){
            $countUser = count(User::all());
            $countMale = count(User::where('gander',1)->get());
            $countFaMale = count(User::where('gander',2)->get());
        }else{
            $countUser = count(User::where(['city'=>Auth::user()->city])->get());
            $countMale = count(User::where(['gander'=>1,'city'=>Auth::user()->city])->get());
            $countFaMale = count(User::where(['gander'=>2,'city'=>Auth::user()->city])->get());
        }
        $countBoxes = count(Box::all());
        $countT1 = count(Box::where('type_box',1)->get());
        $countT0 = count(Box::where('type_box',0)->get());

        $countBlood = count(BloodMoney::all());
        $unreadnoty = auth()->user()->unreadNotifications;
        $readnoty = auth()->user()->readNotifications;
        auth()->user()->unreadNotifications->markAsRead();
        return view('home',compact('unreadnoty',"readnoty","countBlood","countUser","countMale","countFaMale","countBoxes","countT1","countT0"));
    }

    public function change_pass(){
        return view("users/edit_password");
    }

    public function save_password(Request $request){
        $request->validate([
            'password'=>"required",
            "newpassword"=>'required'
        ]);
        $user =  User::find(Auth::id());
        if(Hash::check($request->password, $user->password)) {
            User::find(Auth::id())->update([
                'password'=>Hash::make($request->newpassword)
            ]);
            return redirect()->back()->with("success","تم الحفظ بنجاح");
        }

    }
}
