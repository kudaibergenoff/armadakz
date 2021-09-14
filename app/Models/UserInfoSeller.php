<?php

namespace App\Models;

use App\Traits\AddEdit;
use App\Traits\Scopes;
use App\Traits\UploadImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInfoSeller extends Model
{
    use HasFactory;

    use AddEdit;
    use Scopes;
    use UploadImage;

    protected $table = 'user_info_sellers';
    protected $casts = [
        'phones' => 'array',
        'additional_phone' => 'array',
        'additional_phone_additional' => 'array',
        'additional_phone_comment' => 'array',
        'additional_social' => 'array',
        'additional_social_value' => 'array'
    ];

    protected $fillable = [
        'user_id',
        'sname','name','mname',
        'dob','sex_id','avatar',
        'phones','company','contact_person','contact_phone'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

//    public function city()
//    {
//        return $this->belongsTo(City::class)->withDefault(['title_ru'=>'не указано']);
//    }
//
//    public function lang()
//    {
//        return $this->belongsTo(Lang::class)->withDefault(['title_ru'=>'не указано']);
//    }

    public function sex()
    {
        return $this->belongsTo(Sex::class);
    }
}
