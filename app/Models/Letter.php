<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Letter extends Model
{
    protected $fillable = ['date', 'title', 'from', 'to', 'document_type', 'department_id'];

    public function department() {
        return $this->belongsTo(Department::class);
    }
}
