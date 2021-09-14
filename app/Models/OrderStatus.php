<?php

namespace App\Models;

use App\Traits\AddEdit;
use App\Traits\Scopes;
use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    use AddEdit;
    use Scopes;

    protected $table = 'order_statuses';

    protected $fillable = [
        'slug','title_ru','title_kz','title_en',
    ];

    const COMPLETED = 1; // выполнен
    const CANCELED = 2; // отменён
    const EXPECT = 3; // в ожидании
    const FROZEN = 4; // заморожен
    const BASKET = 5; // в корзине
    const PAID = 6; // оплачен
}
