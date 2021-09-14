<?php

namespace App\Models;

use App\Traits\AddEdit;
use App\Traits\IsBoolean;
use App\Traits\Scopes;
use App\Traits\UploadImage;
use Cviebrock\EloquentSluggable\Sluggable;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Store extends Model
{
//    use Searchable;       15/10/20
    use SoftDeletes;    // Мягкое удаление
    use AddEdit;        // Добавление/редактирование
    use UploadImage;    // Работа с изображениями
    use IsBoolean;         // набор запросов
    use Sluggable;
    public function sluggable():array
    {
        $slug = $this->is_slug == true ? $this->slug : 'title' ;
        return [ 'slug' => ['source' => $slug] ];
    }

    protected $dates = ['deleted_at'];

    protected $table = 'stores_table';

    protected $fillable = [
        'isActive',
        'user_id',//'seller_id',
        'title','is_slug','is_Armada','slug','letter',
        'original_title','description','mini_desc','meta_description','seo_title',
        'address',
        'email','phones',
        'web_url',
        'instagram','facebook','youtube','vkontakte','whatsapp',
        'location',
        'logo','mini_img','background',
        'wallpaper',
        'slider',
        'search_tags',
        'search_map_tags',
        'block','intersection','butik',
        'work_times',//'work_days',
        'addition',
        'work_dop',
        'status',
        'hits',
        'tarif_id',
        'tarif_end_date',
        'is_delivery',
        'is_credit','hcb_link',
        'hot',
        'hot_end_date',
        'msg_for_seller'
    ];

    protected $casts = [
        'logo' => 'array',
        'mini_img' => 'array',
        'background' => 'array',
        'phones' => 'array',
        'work_times' => 'array',
        'block' => 'array',
        'intersection' => 'array',
        'butik' => 'array',
        'is_delivery' => 'boolean',
        'is_credit' => 'boolean',
        'pay_id' => 'array',
        'delivery_id' => 'array',
        'dopservice_id' => 'array',
        'tarif_end_date' => 'date',
        'hot_end_date' => 'date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
//    public function userInfo()
//    {
//        return $this->belongsTo(UserInfo::class,'user_id','user_id')->withDefault(['title_ru'=>'<span class="font-weight-bold text-danger">не указано !!!</span>']);
//    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function activeProducts()
    {
        return $this->hasMany(Product::class)->active();
    }
    public function tarif()
    {
        return $this->belongsTo(Tarif::class);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }


    public function posts()
    {
        return $this->hasMany(Sellers\Post::class);
    }


    public function orders()
    {
        return $this->hasMany(Sellers\Order::class);
    }

    //protected $dates = ['deleted_at'];

    public function searchableAs()
    {
        return 'stores';
    }
    public function maps()
    {
        return $this->hasMany(Map::class);
    }
    public function newmaps()
    {
        return $this->hasMany(NewMap::class);
    }

    public function blocks()
    {
        return $this->hasMany(Block::class);
    }





    //
    public function date_start($work_time)
    {
        $date_start = array_key_exists(0,explode('-',$work_time)) ? explode('-',$work_time)[0] : null;
        return $date_start;
    }

    public function date_end($work_time)
    {
        $string = array_key_exists(1,explode('-',$work_time)) ? explode('-',$work_time)[1] : [];
        $date_end = array_key_exists(0,explode(' ',$string)) ? explode(' ',$string)[0] : null;
        return $date_end;
    }

    public function time_start($work_time)
    {
        $string = array_key_exists(1,explode('-',$work_time)) ? explode('-',$work_time)[1] : [];
        $string = array_key_exists(1,explode(' ',$string)) ? explode(' ',$string)[1] : [];
        $time_start = array_key_exists(0,explode('-',$string)) ? explode('-',$string)[0] : null;
        return $time_start;
    }

    public function time_end($work_time)
    {
        $time_end = array_key_exists(2,explode('-',$work_time)) ? explode('-',$work_time)[2] : null;
        return $time_end;
    }

    public function scopeIsActive($query, $status = 1)
    {
        return $query->where('isActive',$status)
                    ->where('tarif_end_date', '>', now()->format('Y-m-d'));
    }
}
