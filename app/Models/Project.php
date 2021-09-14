<?php

namespace App\Models;

use App\Traits\AddEdit;
use App\Traits\IsBoolean;
use App\Traits\Scopes;
use App\Traits\UploadImage;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    use AddEdit;
    use UploadImage;
    use IsBoolean;
    use Scopes;
    use Sluggable;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected $fillable = [
        'isActive','index','slug',
        'title','description','image','phone','email','url'
    ];

    protected $casts = [
        'images' => 'array',
    ];
}
