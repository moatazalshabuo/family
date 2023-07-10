<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodMoney extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name_box',
        'count_user',
        'all_value',
        'value_in',
        "status",
    ];
}
