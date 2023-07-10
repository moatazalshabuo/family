<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BoxUser extends Model
{
    use HasFactory;
    protected $fillable = ['user_id',"box_id",'status',"price","value_in"];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function box()
    {
        return $this->belongsTo(Box::class,'box_id');
    }
}
