<?php

namespace App\Models;

use App\Traits\AddEdit;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarif extends Model
{
    use HasFactory;

    use AddEdit;

    protected $fillable = [
        'placement_price','title','limit_store_products'
    ];
}
