<?php

namespace App\Models;

use App\Traits\AddEdit;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    use AddEdit;

    protected $fillable = [
        'user_id','status_id','store_id','product_id','email','name','comment','rating',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class)->withDefault(['slug'=>'Нет данных!!!','title'=>'<span class="text-danger font-weight-bold">Нет данных!!!</span>']);
    }

    public function store()
    {
        return $this->belongsTo(Store::class)->withDefault(['slug'=>'Нет данных!!!','title'=>'<span class="text-danger font-weight-bold">Нет данных!!!</span>']);
    }

    public function status()
    {
        return $this->belongsTo(ReviewStatus::class,'status_id','id');
    }
}
