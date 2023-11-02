<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = "news";

    protected $fillable = [
        'title',
        'naslov',
        'content',
        'sadrzaj',
        'photo'
    ];

    public function photos() {

        return $this->hasMany(GalleryPhoto::class, 'news_id', 'id');

    }
}
