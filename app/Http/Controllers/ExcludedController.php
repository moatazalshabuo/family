<?php

namespace App\Http\Controllers;

use App\Models\Excluded;
use App\Models\User;
use Illuminate\Http\Request;

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
            return redirect()->back()->with("success", 'تم الاضافة بنجاح');
        } else {
            return redirect()->back()->with("error", 'الفرد مستثني مسبقا');
        }
    }

    public function delete($id)
    {
        Excluded::find($id)->delete();
        return redirect()->back()->with("success", 'تم الحذف بنجاح');
    }
}
