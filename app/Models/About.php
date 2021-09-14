<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = [
        'slider',
        'text',
        'seo_description',
        'seo_keywords'
    ];
}
