<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\RecordUserMove;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = User::query();

        if (request('NId')) {
            $query->where("NId", request('NId'));
        }
        if (request('name')) {
            $query->where("name", "like", "%" . request('name') . "%");
        }
        if (request('Qualification')) {
            $query->where('Qualification', "like", "%" . request('Qualification') . "%");
        }
        if (request('gander')) {
            $query->where('gander', request('gander'));
        }
        if (Auth::user()->type != 1) {
            $query->where('city', 'like', "%" . Auth::user()->city . "%");
            $query->where('type', '!=', 1);
            $users = $query->paginate(15);
        } else {
            if (Auth::user()->admin == 1) {
                $users = $query->paginate(20);
            } else {
                $users = $query->where('admin', "!=", '1')->paginate(20);
            }
        }

        return view("users/manage", compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("users/create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            "surename" => ['required', 'string', 'max:30'],
            "birthday" => ['required'],
            "gander" => ['required'],
            "city" => ['required'],
            "NId" => ['required', 'unique:users,NId'],
            "Qualification" => ['required'],
            'Specialization' => ['required'],
            'FNId' => ['required'],
            "marital_status" => ['required'],
            "life" => ['required'],
            "is_work" => ['required'],
        ]);
        $age = DateTime::createFromFormat('Y-m-d', $request['birthday'])
            ->diff(new DateTime('now'))
            ->y;
        User::create([
            'name' => $request['name'],
            'password' => Hash::make($request['phone']),
            "surename" => $request['surename'],
            "birthday" => $request['birthday'],
            "age" => $age,
            "gander" => $request['gander'],
            "city" => $request['city'],
            "phone" => $request['phone'],
            "NId" => $request['NId'],
            "Qualification" => $request['Qualification'],
            'Specialization' => $request['Specialization'],
            'FNId' => $request['FNId'],
            "MNID" => $request['MNId'],
            'type' => $request['type'],
            "marital_status" => $request['marital_status'],
            "life" => $request['life'],
            "is_work" => $request['is_work'],
        ]);
        Helper::record_move(Auth::id(), "قام باضافة مستخدم " . $request['name']);
        return redirect()->back()->with("success", "تم الاضافة بنجاح");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        return view("users/edit", compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $users = User::find($id);
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            "surename" => ['required', 'string', 'max:30'],
            "birthday" => ['required'],
            "gander" => ['required'],
            "city" => ['required'],
            "NId" => ['required', 'unique:users,NId,' . $id],
            "Qualification" => ['required'],
            'Specialization' => ['required'],
            'FNId' => ['required'],
            "marital_status" => ['required'],
            "life" => ['required'],
            "is_work" => ['required'],
        ]);
        if ($request->has('password') && !empty($request->password)) {
            $request->validate([
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);

            $users->password = Hash::make($request['password']);
        }
        $age = DateTime::createFromFormat('Y-m-d', $request['birthday'])
            ->diff(new DateTime('now'))
            ->y;
        $users->update([
            'name' => $request['name'],
            "surename" => $request['surename'],
            "birthday" => $request['birthday'],
            "age" => $age,
            "gander" => $request['gander'],
            "city" => $request['city'],
            "phone" => $request['phone'],
            "NId" => $request['NId'],
            "Qualification" => $request['Qualification'],
            'Specialization' => $request['Specialization'],
            'FNId' => $request['FNId'],
            "MNID" => $request['MNId'],
            'type' => $request['type'],
            "marital_status" => $request['marital_status'],
            "life" => $request['life'],
            "is_work" => $request['is_work'],
        ]);
        Helper::record_move(Auth::id(), "قام بتعديل مستخدم " . $request['name']);
        return redirect()->route("users.index")->with("success", "تم التعديل بنجاح");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function Move_users()
    {
        $query = RecordUserMove::query();

        if (Auth::user()->type != 1) {
            $user = [];
            $user1 = [];
            foreach (User::where('type', 1)->get() as $val) {
                $user[] = $val->id;
            }
            foreach (User::where('city', 'like', "%" . Auth::user()->city . "%")->get() as $val) {
                $user1[] = $val->id;
            }

            $query->whereNotIn('user', $user)->whereIn("user",$user1);
            $users = $query->paginate(20);
        } else {
            if (Auth::user()->admin == 1) {
                $users = $query->with('user_p')->paginate(20);
            } else {
                $users = $query->where('admin', "!=", '1')->with('user_p')->paginate(20);
            }
        }

        return view("users/move_users", compact('users'));
    }
}
