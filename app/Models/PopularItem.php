<?php

namespace App\Models;

use App\Traits\UploadImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PopularItem extends Model
{
    use HasFactory;

    use UploadImage;

    protected $fillable = [
        'model','model_id',
    ];

    protected $casts = [
        'images' => 'array',
    ];
}
