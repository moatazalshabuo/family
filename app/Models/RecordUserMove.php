<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecordUserMove extends Model
{
    use HasFactory;
    protected $fillable = ['user','descripe'];

    public function user_p()
    {
        return $this->belongsTo(User::class,"user");
    }
}
