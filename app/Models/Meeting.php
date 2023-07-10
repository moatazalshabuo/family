<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use HasFactory;
    protected $fillable = ['id',"title","descripe","time"];

    public function countUser(){
        return count(MeetingUser::where('meeting_id',$this->id)->get());
    }
}
