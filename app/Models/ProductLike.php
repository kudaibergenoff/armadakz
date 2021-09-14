<?php

namespace App\Models;

use App\Traits\AddEdit;
use Illuminate\Database\Eloquent\Model;

class ProductLike extends Model
{
    use AddEdit;

    protected $table = 'product_likes';

    protected $fillable = [
        'user_id',
        'product_id',
    ];
}
