<?php

namespace App\Models;

use App\Traits\AddEdit;
use Illuminate\Database\Eloquent\Model;

class ProductView extends Model
{
    use AddEdit;

    protected $fillable = [
        'user_id',
        'product_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class)->withDefault(['title'=>null,]);
    }
}
