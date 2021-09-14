<?php

namespace App\Models;

use App\Traits\AddEdit;
use App\Traits\IsBoolean;
use App\Traits\Scopes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    use AddEdit;
    use Scopes;
    use IsBoolean;

    protected $fillable = [
        'status','type','organization','name','position','phone',
        'site','ad_type1','ad_type2','ad_type3',
        'size_from','size_to','product_type','lifetime','factory','customer_type_id','present_type','product_class','assembly_work','note'
    ];
}
