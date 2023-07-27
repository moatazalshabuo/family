<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\BloodMoney;
use App\Models\BloodMoneyUser;
use App\Models\Excluded;
use App\Models\User;
use App\Notifications\Mynotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BloodMoneyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (isset($request->all)) {
            $boxes = BloodMoney::all();
        } else {
            $boxes = BloodMoney::where('status', 1)->get();
        }
        return view("bload_mony/index", compact('boxes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("bload_mony/create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $query = User::query()->where('life', 1);
        if (isset($request->age)) {
            $query->where('age', ">", $request->age);
        }
        if (isset($request->is_work)) {
            $query->where('is_work', $request->is_work);
        }
        if (isset($request->gander)) {
            $query->where('gander', $request->gander);
        }
        if (isset($request->city)) {
            $query->where('city', "like", "%" . $request->city . "%");
        }
        if (isset($request->marital_status)) {
            $query->where('marital_status', $request->marital_status);
        }
        $ids = array();
        foreach (Excluded::all() as $item) {
            array_push($ids, $item->id);
        }
        $users = $query->whereNotIn('id', $ids)->get();

        if (count($users) > 0) {


            $box = BloodMoney::create([
                'name_box' => $request->name_box,
                'all_value' => $request->value,
                "status" => 1,
            ]);
            Helper::record_move(Auth::id(),"اضافة صندوق دية باسم ".$request->name_box);
            foreach ($users as $item) {
                $_v = BloodMoneyUser::create(
                    [
                        'user_id' => $item->id,
                        "bm_id" => $box->id,
                        "price" => ($request->value / count($users)),
                        "value_in" => 0
                    ]
                );
                User::find($item->id)->notify(new Mynotification(["title" => 'يوجد لديك قيمة دية عليك سدادها', 'price' => $_v->price, "name" => $request->name_box]));
            }
        } else {
            return redirect()->back()->with("error", 'لا يوجد مستخدمين بالخيارات المدخلة');
        }
        return redirect()->route("blood.index");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $bloodMoney = BloodMoney::find($id);
        $box_user = BloodMoneyUser::with('user')->where('bm_id', $bloodMoney->id)->get();
        $box_user_active = count(BloodMoneyUser::where(['bm_id' => $bloodMoney->id, 'status' => 0])->get());
        return view('bload_mony/box', compact('bloodMoney', 'box_user', 'box_user_active'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BloodMoney $bloodMoney)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BloodMoney $bloodMoney)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BloodMoney $bloodMoney)
    {
        //
    }
    public function control_user(Request $request)
    {
        if (Auth::user()->type == 1)
            $users = User::all();
        else
            $users = User::where('city', 'like', '%' . Auth::user()->city . "%")->get();

        $user_box = "";
        if (isset($request->user)) {
            $user_box = BloodMoneyUser::with('blood')->where(['user_id' => $request->user, 'status' => 1])->get();
            // print_r($user_box);die();
        }
        return view("bload_mony/control_user", compact('users', 'user_box'));
    }

    public function push(Request $request, $id)
    {
        $user_box = BloodMoneyUser::where(['user_id' => $id, 'status' => 1])->get();

        foreach ($user_box as $item) {
            $_box = BloodMoneyUser::find($item->id);
            if (isset($_POST['pay' . $item->box_id]) && $_POST['pay' . $item->box_id] != 0) {
                // die('');
                if (($_box->value_in + $_POST['pay' . $item->box_id]) <= $_box->price) {
                    $_box->update([
                        'value_in' => $item->value_in + $_POST['pay' . $item->box_id],
                    ]);
                    // die($_box->value_in);
                    Helper::record_move(Auth::id(),"قام باضافة قيمة المستخدم  ".User::find($_box->user_id)->name . "الى صندوق الدية ".BloodMoney::find($_box->box_id)->name_box);
                } else {
                    return redirect()->back()->with('error', 'القيمة المدفوعة اكبر من قيمة المخصصه لك' . " " . $item->box->name_box);
                }
            }
            if (isset($_POST['unpay' . $item->box_id]) && $_POST['unpay' . $item->box_id] != 0) {
                if ($_POST['unpay' . $item->box_id] <= $_box->value_in) {
                    // die($item->value_in - $_POST['unpay' . $item->box_id]);
                    $_box->update([
                        'value_in' => $item->value_in - $_POST['unpay' . $item->box_id],
                    ]);
                    Helper::record_move(Auth::id(),"قام باسترجاع قيمة المستخدم  ".User::find($_box->user_id)->name . "من صندوق الدية ".BloodMoney::find($_box->box_id)->name_box);

                } else {
                    return redirect()->back()->with('error', 'القيمة المخصومة اكبر من قيمة المخصصه لك' . " " . $item->box->name_box);
                }
            }
        }
        Helper::status_blood_user();
        return redirect()->back()->with('success', "تم الحفظ بنجاح");
    }
}
