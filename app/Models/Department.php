<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = ['name'];

    public function user() {
        return $this->hasMany(User::class);
    }

    public function letter() {
        return $this->hasMany(Letter::class);
    }
}
