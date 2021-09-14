<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = "blogs";

    protected $guards = [];

    public function blog_category()
    {
        return $this->belongsTo(BlogCategory::class);
    }
}
