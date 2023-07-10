<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodMoneyUser extends Model
{
    use HasFactory;
    protected $fillable = ['user_id',"bm_id",'status',"price","value_in"];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function blood()
    {
        return $this->belongsTo(BloodMoney::class,'bm_id');
    }
}
