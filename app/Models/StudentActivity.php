<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentActivity extends Model
{
    use HasFactory;

    protected $table = "student_activities";

    protected $fillable = [
        'title',
        'naslov',
        'content',
        'sadrzaj',
        'photo',
        'video'
    ];
}
