<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disseminations extends Model
{
    use HasFactory;

    protected $table = 'disseminations';

    protected $fillable = [
        'title',
        'naslov',
        'content',
        'sadrzaj',
        'photo',
        'video',
        'link'
    ];

    public function photos() {

        return $this->hasMany(GalleryPhoto::class, 'dissemination_id', 'id');

    }
}
