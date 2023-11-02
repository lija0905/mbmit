<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResearcherLinks extends Model
{
    use HasFactory;

    protected $table = 'researcher_links';

    protected $fillable = ['link_name', 'link', 'researcher_id'];
}
