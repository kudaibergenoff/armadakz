<?php

namespace App\Models;

use App\Traits\AddEdit;
use App\Traits\IsBoolean;
use App\Traits\IsJson;
use App\Traits\Scopes;
use App\Traits\UploadImage;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

//use Laravel\Scout\Searchable;                     15/10/20
//use Nicolaslopezj\Searchable\SearchableTrait;

class Product extends Model
{
    use SoftDeletes;    // Мягкое удаление
    use AddEdit;
    use UploadImage;
    use IsBoolean;
    use IsJson;
    use Scopes;
    use Sluggable;
    public function sluggable(): array
    {
        $slug = $this->is_slug == true ? $this->slug : 'title' ;
        return [ 'slug' => ['source' => $slug] ];
    }
//    use Searchable;           15/10/20
//    use SearchableTrait;

    protected $table = 'products';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'isActive','status',
        'store_id','catalog_id','subcatalog_id','country_id','item_id',
        'is_delivery',
        'presence_id',
        'is_discount', 'discount',
        'title','price',
        'is_delivery',
        'description','articul','images','colors',
        'material',
        'manufacture',
        'width','height','depth','origin','status',
        'hits',
        'is_hot','fiver','used','is_slug','slug',
        'detail',
        'seo_title','meta_description','meta_tags'
    ];

    protected $casts = [
        'colors' => 'array',
        'images' => 'array',
        'delivery_ids' =>'array',
        'pay_ids' =>'array'
    ];

    public function catalog()
    {
        return $this->belongsTo(Catalog::class, 'catalog_id', 'id')->withDefault(['title'=>'<span class="text-danger font-weight-bold">нет данных !!!</span>']);
    }
    public function subcatalog()
    {
        return $this->belongsTo(Subcatalog::class, 'subcatalog_id', 'id')->withDefault(['title'=>'<span class="text-danger font-weight-bold">нет данных !!!</span>']);
    }
    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id', 'id')->withDefault(['title'=>'<span class="text-danger font-weight-bold">нет данных !!!</span>']);
    }
    public function items()
    {
        return $this->belongsToMany(Item::class);
    }
    public function store()
    {
        return $this->belongsTo(Store::class)->withDefault(['title'=>'<span class="text-danger font-weight-bold">нет данных !!!</span>']);
    }
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function additional()
    {
        return $this->hasMany(ProductAdditional::class);//,'id','product_id'
    }
    public function review()
    {
        return $this->hasMany(Review::class);
    }
    public function presence()
    {
        return $this->belongsTo(Presence::class);
    }

//    public function searchableAs()
//    {
//        return 'products';
//    }
//    public function order()
//    {
//        return $this->hasMany(Sellers\Order::class);
//    }
//    protected $searchable = [
//        'columns' => [
//            'products.title' => 5,
//        ]
//    ];

    // Scopes
    public function scopeActive($query)
    {
        $query = $query->where('status',true)
            ->whereHas('store', function($q){
                $q->where('status', true);
                $q->where('tarif_end_date', '>', now()->format('Y-m-d'));
            })
            ->where('slug','!=',null)
            ->where('images','!=',null)
            ->where('price','!=',0);
        return $query;
    }

//    public function getPriceAttribute()
//    {
//        return number_format($this->attributes['price'], 0, ',', ' ');
//    }

//    public function getPrice2Attribute()
//    {
//        return number_format($this->attributes['price_2'], 0, ',', ' ');
//    }

    public function setItem($ids)
    {
        if($ids == null) { return; }

        $this->items()->sync($ids);
    }

}
