<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryPhoto extends Model
{
    use HasFactory;

    protected $table = "gallery_photos";

    protected $fillable = [
        "dissemination_id",
        "news_id",
        "gallery_id",
        "photo"
    ];

}
