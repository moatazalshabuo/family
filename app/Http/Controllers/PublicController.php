<?php

namespace App\Http\Controllers;

use App\Models\BloodMoney;
use App\Models\BloodMoneyUser;
use App\Models\BoxUser;
use App\Models\MeetingUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller
{
    public function box(){
        $box = BoxUser::with('box')->where("user_id",Auth::id())->get();
        return view("user/box",compact('box'));
    }

    public function blood(){
        $blood = BloodMoneyUser::with('blood')->where("user_id",Auth::id())->get();
        return view("user/blood",compact('blood'));
    }

    public function meeting(){
        $meeting = MeetingUser::with('meeting')->where("user_id",Auth::id())->get();
        return view("user/meet",compact('meeting'));
    }
}
