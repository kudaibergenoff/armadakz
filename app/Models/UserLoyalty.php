<?php

namespace App\Models;

use App\Traits\AddEdit;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLoyalty extends Model
{
    use HasFactory;

    use AddEdit;

    public $table = "user_loyalties";

    protected $fillable = [
        'type','user_id','order_id','store_id','partner_id',
        'discount','amt','data_end'
    ];

    protected $casts = [
        'data_end' => 'date',
    ];

    // type
    const INCOME = 1; // приход
    const EXPENSE = 2; // расход
    const ZERO = 3; // обнуление
    const TRANSFER = 4; // перечисление
    const CREDIT = 5; // зачисление

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function partner()
    {
        return $this->belongsTo(User::class);
    }
}
