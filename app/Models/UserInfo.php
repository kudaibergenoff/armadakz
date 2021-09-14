<?php

namespace App\Models;

use App\Traits\AddEdit;
use App\Traits\IsBoolean;
use App\Traits\Scopes;
use App\Traits\UploadImage;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    use AddEdit;
    use Scopes;
    use UploadImage;
    use IsBoolean;

    protected $table = 'user_infos';
    protected $casts = [
        'phones' => 'array',
        'avatar' => 'array'
    ];

    protected $fillable = [
        'user_id','city_id','lang_id',
        'sname','name','mname',
        'dob','sex_id',
        'phones','address','facebook','google'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class)->withDefault(['title_ru'=>'не указано']);
    }

    public function lang()
    {
        return $this->belongsTo(Lang::class)->withDefault(['title_ru'=>'<span class="font-weight-bold text-danger">не указано !!!</span>']);
    }

    public function sex()
    {
        return $this->belongsTo(Sex::class);
    }



    //

    public function setDsoBs()
    {
        return $this->DsoBs = 123;
    }
    //
    public function fio()
    {
        $sname = ucfirst($this->sname ?? null);
        $name = ucfirst($this->name ?? null);
        $mname = ucfirst($this->mname ?? null);
        $fio = ($sname != null or $name != null) ? $sname . ' ' . $name . ' ' . $mname : '<span class="text-danger font-weight-bold">Нет данных !!!</span>';
        return $fio;
    }

    public function phone()
    {
        $phone = (isset($this->phones) and is_array($this->phones)) ? $this->phones[0] : null;
        return $phone;
    }
}
