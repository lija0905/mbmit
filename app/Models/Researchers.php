<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Researchers extends Model
{
    use HasFactory;

    protected $table = "researchers";

    protected $fillable = [
        "fullname",
        "email",
        "title",
        "titula",
        "photo",
        "type_id"
    ];

    public function researcher_type() {

        return $this->hasOne(ResearchersType::class, 'id', 'type_id');
    }

    public function researcher_links() {

        return $this->hasMany(ResearcherLinks::class, 'researcher_id', 'id');

    }

    public function publications() {

        return $this->belongsToMany(Publications::class, 'publications_authors', 'author_id', 'publication_id');
    }

    public function user() {

        return $this->hasOne(User::class, 'email', 'email');
    }
}
