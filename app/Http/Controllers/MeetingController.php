<?php

namespace App\Http\Controllers;

use App\Models\Excluded;
use App\Models\Meeting;
use App\Models\MeetingUser;
use App\Models\User;
use App\Notifications\Mynotification;
use Illuminate\Http\Request;

class MeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $meeting = Meeting::all();
        return view("meeting/index",compact('meeting'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $query = User::query()->where('life',1);
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
            $query->where('city',"like","%".$request->city."%");
        }
        if(isset($request->marital_status)){
            $query->where('marital_status',$request->marital_status);
        }
        $ids = array();
        foreach (Excluded::all() as $item) {
            array_push($ids, $item->id);
        }
        $users = $query->whereNotIn('id', $ids)->get();

        if (count($users) > 0) {


            $box = Meeting::create([
                'title' => $request->title,
                'descripe' => $request->descripe,
                "time" => $request->time,
            ]);

            foreach ($users as $item) {
                $_v = MeetingUser::create(
                    [
                        'user_id' => $item->id,
                        "meeting_id" => $box->id,
                    ]
                );
                User::find($item->id)->notify(new Mynotification(["title"=>'يوجد اجتماع','name'=>$box->title,"descripe"=>$box->descripe]));
            }
        } else {
            return redirect()->back()->with("error",'لا يوجد مستخدمين بالخيارات المدخلة');
        }
        return redirect()->route("meeting.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Meeting $meeting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Meeting $meeting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Meeting $meeting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Meeting $meeting)
    {
        //
    }
}
