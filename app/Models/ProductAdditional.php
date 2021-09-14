<?php

namespace App\Models;

use App\Traits\AddEdit;
use App\Traits\IsBoolean;
use App\Traits\IsJson;
use App\Traits\Scopes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAdditional extends Model
{
    use HasFactory;

    use AddEdit;
    use IsBoolean;
    use IsJson;
    use Scopes;

    protected $fillable = [
        'discount','discount_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function additional()
    {
        return $this->belongsTo(Product::class,'additional_id','id');
    }
}
