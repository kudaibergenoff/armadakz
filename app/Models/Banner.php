<?php

namespace App\Models;

use App\Traits\AddEdit;
use App\Traits\IsBoolean;
use App\Traits\Scopes;
use App\Traits\UploadImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    use AddEdit;
    use Scopes;
    use IsBoolean;
    use UploadImage;

    protected $table = 'banners';

    protected $dates = ['start_at','end_at','created_at','updated_at','deleted_at'];

    protected $fillable = [
        'isActive','type_id','index','views','clicks',
        'title','company_title','link','html','comment','start_at','end_at','archive','pause'
    ];

    public function type()
    {
        return $this->belongsTo(BannerType::class,'type_id','id');
    }

}
