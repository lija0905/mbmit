<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WelcomeSection extends Model
{
    use HasFactory;

    protected $table = 'welcome_section';

    protected $fillable = [
        'title',
        'naslov',
        'opis',
        'description'
    ];
}
