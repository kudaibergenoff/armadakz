<?php

namespace App\Models;

use App\Traits\AddEdit;
use App\Traits\IsBoolean;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    use AddEdit;
    use IsBoolean;

    protected $fillable = [
        'isActive',
        'title',
        'body',
        'slug',
        'is_banner',
        'meta_description',
        'meta_keywords'
    ];
}
