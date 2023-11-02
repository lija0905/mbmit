<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publications extends Model
{
    use HasFactory;

    protected $table = "publications";

    protected $fillable = [
        'title',
        'naziv',
        'abstract',
        'opis',
        'link',
        'type_id'
    ];

    public function publication_type() {

        return $this->hasOne(PublicationsType::class, 'id', 'type_id');

    }

    public function authors() {

        return $this->belongsToMany(Researchers::class, 'publications_authors', 'publication_id', 'author_id');
    }
}
