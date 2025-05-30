<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Letter extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'date',
        'department_id',
        'user_id',
        'from',
        'to',
        'document_type',
        'attachment_path',
        'attachment_name'
    ];

    protected $casts = [
        'date' => 'date',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
