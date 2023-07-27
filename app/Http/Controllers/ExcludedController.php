<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Excluded;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExcludedController extends Controller
{
    public function index()
    {
        $users = User::all();
        $Excul = Excluded::with('user')->get();
        return view("excluded/index", compact('users', 'Excul'));
    }

    public function store(Request $request)
    {
        if (!isset(Excluded::where('user_id', $request->id)->first()->id)) {
            Excluded::create([
                'user_id' => $request->id,
                "descripe" => $request->descripe
            ]);
            Helper::record_move(Auth::id(), "اضافة المفرد  " . User::find($request->id)->name . "الى الاستثناء ");
            return redirect()->back()->with("success", 'تم الاضافة بنجاح');
        } else {
            return redirect()->back()->with("error", 'الفرد مستثني مسبقا');
        }
    }

    public function delete($id)
    {
        $ex = Excluded::find($id);
        Helper::record_move(Auth::id(), "الغاء المفرد  " . User::find($ex->user_id)->name . "من الاستثناء ");
        $ex->delete();
        return redirect()->back()->with("success", 'تم الحذف بنجاح');
    }
}
