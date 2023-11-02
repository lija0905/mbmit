<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LanguageOptions extends Model
{
    use HasFactory;

    protected $table = 'language_options';

    protected $fillable = [
        'name',
        'code'
    ];
}
