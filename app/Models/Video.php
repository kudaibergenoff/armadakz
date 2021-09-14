<?php

namespace App\Models;

use App\Traits\AddEdit;
use App\Traits\IsBoolean;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    use AddEdit, IsBoolean;

    protected $fillable = [
        'is_active','title','url'
    ];
}
