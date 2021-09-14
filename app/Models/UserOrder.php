<?php

namespace App\Models;

use App\Traits\AddEdit;
use Illuminate\Database\Eloquent\Model;

class UserOrder extends Model
{
    use AddEdit;

    protected $table = 'user_orders';

    protected $fillable = [
        'status',
        'user_id',
        'product_id',
        'price'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function status()
    {
        return $this->belongsTo(OrderStatus::class,'order_status_id','id','order_statuses');
    }
}
