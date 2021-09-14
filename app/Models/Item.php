<?php

namespace App\Models;

use App\Traits\AddEdit;
use App\Traits\IsBoolean;
use App\Traits\IsJson;
use App\Traits\UploadImage;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use AddEdit;
    use UploadImage;
    use IsBoolean;
    use IsJson;
    use Sluggable;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected $table = 'items';

    protected $fillable = [
        'index','isActive','is_popular',
        'subcatalog_id',
        'slug','h1','title','menu_title',
        'images',
        'meta_title','meta_desc','meta_tag','seo_text'
    ];

    protected $casts = [
        'images' => 'array',
    ];

    public function catalog()
    {
        return $this->belongsTo(Catalog::class)->withDefault(['title'=>'нет данных']);
    }

    public function subcatalog()
    {
        return $this->belongsTo(Subcatalog::class)->withDefault(['title'=>'нет данных']);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
