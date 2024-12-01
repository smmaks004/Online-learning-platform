<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'text',
        'teacher_id',
        'category',
        'level',
        'cost',
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id'); //
    }
}
