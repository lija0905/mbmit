<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResearchersType extends Model
{
    use HasFactory;

    protected $table = "researchers_type";

    protected $fillable = [
        "id",
        "type_name",
    ];
}
