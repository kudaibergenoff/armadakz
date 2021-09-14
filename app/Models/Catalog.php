<?php

namespace App\Models;

use App\Traits\AddEdit;
use App\Traits\IsBoolean;
use App\Traits\IsJson;
use App\Traits\Scopes;
use App\Traits\UploadImage;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    use AddEdit;
    use UploadImage;
    use IsBoolean;
    use IsJson;
    use Scopes;
    use Sluggable;

    public function sluggable():array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected $table = 'catalogs';

    protected $fillable = [
        'index','isActive',
        'title','menu_title','meta_title',
        'meta_desc','meta_tag','h1',
        'svg','images',
    ];

    protected $casts = [
        'images' => 'array',
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'catalog_id', 'id');
    }

    public function catalog()
    {
        return $this->belongsTo(Catalog::class)->withDefault(['title'=>'<span class="text-danger font-weight-bold">нет данных !!!</span>']);
    }

    public function subcatalogs()
    {
        return $this->hasMany(Subcatalog::class);
    }
    public function items()
    {
        return $this->hasMany(Item::class);
    }

}
