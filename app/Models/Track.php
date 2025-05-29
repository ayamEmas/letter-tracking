<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    protected $fillable = [
        'letter_id',
        'user_id_to',
        'department_id_to',
        'user_id_from',
        'department_id_from',
    ];

}