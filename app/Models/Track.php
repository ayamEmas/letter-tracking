<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    protected $table = 'track_doc';

    protected $fillable = [
        'letter_id',
        'user_id_to',
        'department_id_to',
        'user_id_from',
        'department_id_from',
    ];

    public function letter()
    {
        return $this->belongsTo(Letter::class);
    }

    public function userTo()
    {
        return $this->belongsTo(User::class, 'user_id_to');
    }

    public function userFrom()
    {
        return $this->belongsTo(User::class, 'user_id_from');
    }

    public function departmentTo()
    {
        return $this->belongsTo(Department::class, 'department_id_to');
    }

    public function departmentFrom()
    {
        return $this->belongsTo(Department::class, 'department_id_from');
    }
}