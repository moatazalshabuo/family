<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Box;
use App\Models\BoxUser;
use App\Models\Excluded;
use App\Models\User;
use App\Notifications\Mynotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Ui\Presets\React;

class BoxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (isset($request->all)) {
            $boxes = Box::all();
        } else {
            $boxes = Box::where('status', 1)->get();
        }
        return view("boxes/index", compact('boxes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("boxes/create");
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
        if (isset($request->marital_status)) {
            $query->where('marital_status', $request->marital_status);
        }
        if (isset($request->city)) {
            $query->where('city',"like","%".$request->city."%");
        }
        $ids = array();
        foreach (Excluded::all() as $item) {
            array_push($ids, $item->id);
        }
        $users = $query->whereNotIn('id', $ids)->get();
        if (count($users) > 0) {
            $box = Box::create([
                'name_box' => $request->name_box,
                'type_box' => $request->type_box,
                "periodic_value" => ($request->for == 1) ? $request->value : null,
                'all_value' => ($request->for == 0) ? $request->value : null,
                'value_still' => ($request->for == 0) ? $request->value : null,
                "status" => 1,
            ]);

            foreach ($users as $item) {
                $_v = BoxUser::create(
                    [
                        'user_id' => $item->id,
                        "box_id" => $box->id,
                        "price" => ($request->for == 0) ? ($request->value / count($users)) : $request->value,
                        "value_in" => 0
                    ]
                );
                User::find($item->id)->notify(new Mynotification(["title"=>'يوجد لديك قيمة عليك سدادها','price'=>$_v->price,"name"=>$request->name_box]));
            }
        } else {
            return redirect()->back()->with("error",'لا يوجد مستخدمين بالخيارات المدخلة');
        }
        return redirect()->route("box.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Box $box)
    {
        $box_user = BoxUser::with('user')->where('box_id', $box->id)->get();
        $box_user_active = count(BoxUser::where(['box_id' => $box->id, 'status' => 0])->get());
        return view('boxes/box', compact('box', 'box_user', 'box_user_active'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Box $box)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Box $box)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Box $box)
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
            $user_box = BoxUser::with('box')->where(['user_id' => $request->user, 'status' => 1])->get();
            // print_r($user_box);die();
        }
        return view("boxes/control_user", compact('users', 'user_box'));
    }

    public function push(Request $request, $id)
    {
        $user_box = BoxUser::where(['user_id' => $id, 'status' => 1])->get();

        foreach ($user_box as $item) {
            $_box = BoxUser::find($item->id);
            if (isset($_POST['pay' . $item->box_id]) && $_POST['pay' . $item->box_id] != 0) {
                // die('');

                if (($_box->value_in + $_POST['pay' . $item->box_id]) <= $_box->price) {

                    $_box->update([
                        'value_in' => $item->value_in + $_POST['pay' . $item->box_id],
                    ]);
                    // die($_box->value_in);
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
                } else {
                    return redirect()->back()->with('error', 'القيمة المخصومة اكبر من قيمة المخصصه لك' . " " . $item->box->name_box);
                }
            }
        }
        Helper::status_box_user();
        return redirect()->back()->with('success', "تم الحفظ بنجاح");
    }
}
