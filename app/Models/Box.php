<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Box extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_box',
        'count_user',
        'type_box',
        "periodic_value",
        'all_value',
        'value_in',
        'value_still',
        "status",
    ];
}
