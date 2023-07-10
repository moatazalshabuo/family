<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeetingUser extends Model
{
    use HasFactory;
    protected $fillable = ['id',"meeting_id","user_id"];

    public function meeting() {
        return $this->belongsTo(Meeting::class,'meeting_id');
    }
    public function users() {
        return $this->belongsTo(User::class,'user_id');
    }
}
