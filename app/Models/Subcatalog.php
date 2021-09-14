<?php

namespace App\Models;

use App\Traits\AddEdit;
use App\Traits\IsBoolean;
use App\Traits\IsJson;
use App\Traits\Scopes;
use App\Traits\UploadImage;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
//use App\Models\{Catalog, Item, Product};

class Subcatalog extends Model
{
    use AddEdit;
    use UploadImage;
    use IsBoolean;
    use IsJson;
    use Scopes;
    use Sluggable;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected $table = 'subcatalogs';

    protected $fillable = [
        'index','isActive','is_popular',
        'catalog_id',
        'slug','title',
        'meta_title','meta_desc','meta_tag','seo_text','h1',
        'hits',
        'images',
        'onpopular'
    ];

    protected $casts = [
        'images' => 'array',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function catalog()
    {
        return $this->belongsTo(Catalog::class)->withDefault(['title'=>'нет данных']);
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
