<?php

namespace App\Models;

use App\Traits\AddEdit;
use App\Traits\IsBoolean;
use App\Traits\IsJson;
use App\Traits\UploadImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    use AddEdit;
    use AddEdit;
    use IsJson;
    use IsBoolean;
    use UploadImage;

    protected $fillable = [
        'status_id','user_id','order_id','token_stat','token',
        'fio','email','phone','country_id','city_id','address','comment',
        'store_id','store_title','store_slug','is_callback',
        'product_id','title','image','price','price_2','articul','count',
        'client_name','client_email','client_phone','not_disturb',
        'pay_id','delivery_id','dop_services_id','pay_result'
    ];

    protected $casts = [
        'pay_result' => 'array',
    ];

    public function userInfo()
    {
        return $this->belongsTo(UserInfo::class, 'user_id','user_id')->withDefault(['name'=>'нет данных']);
    }

    public function product()
    {
        return $this->belongsTo(Product::class)->withDefault(['slug'=>null]);
    }

    public function store()
    {
        return $this->belongsTo(Store::class,'store_id','id')->withDefault(['slug'=>null]);
    }

    public function orderStatus()
    {
        return $this->belongsTo(OrderStatus::class,'status_id','id')->withDefault(['title_ru'=>'нет данных']);
    }

    public function country()
    {
        return $this->belongsTo(Country::class)->withDefault(['title_ru'=>'нет данных']);
    }

    public function city()
    {
        return $this->belongsTo(City::class)->withDefault(['title_ru'=>'нет данных']);
    }

//    public function getPriceAttribute()
//    {
//        return number_format($this->attributes['price'], 0, ',', ' ');
//    }

//    public function getPrice2Attribute()
//    {
//        return number_format($this->attributes['price_2'], 0, ',', ' ');
//    }
}
