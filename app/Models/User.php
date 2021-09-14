<?php

namespace App\Models;

use App\Traits\AddEdit;
use App\Traits\IsBoolean;
use App\Traits\UploadImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    use AddEdit,UploadImage,IsBoolean;

//    use SoftDeletes; // Мягкое удаление
//    protected $dates = ['deleted_at'];

    protected $fillable = [
        'role_id','lang_id','city_id','address','sname','name','mname','email','company','contact_person','contact_phone','vip','ip_address','seller_device_info','last_login_date','hcb_link',
        'additional_phone','additional_phone_additional','additional_phone_comment','additional_social','additional_social_value'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_login_date' => 'datetime',
        'phones' => 'array',
        'avatar' => 'array',
        'additional_phone' => 'array',
        'additional_phone_additional' => 'array',
        'additional_phone_comment' => 'array',
        'additional_social' => 'array',
        'additional_social_value' => 'array'
    ];

    const USER = 1;
    const SELLER = 2;
    const ADMIN = 3;

    const VIP_SILVER = 1;
    const VIP_GOLD = 2;
    const VIP_PLATINUM = 3;

    public function status()
    {
        return $this->hasOne(UserStatus::class,'id','status_id');
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

//    public function infoSeller()
//    {
//        return $this->hasOne(UserInfoSeller::class)->withDefault(['sname'=>null,'name'=>null]);
//    }

    public function role()
    {
        return $this->belongsTo(UserRole::class,'role_id','id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class)->where('status_id','!=',OrderStatus::BASKET);
    }

    public function stores()
    {
        return $this->hasMany(Store::class);
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
        $phone = (isset($this->phones) and is_array($this->phones) and isset($this->phones[0])) ? $this->phones[0] : null;
        return $phone;
    }

    public function hasPermissionTo($permission)
    {
        foreach ($permission->roles as $role){
            if($this->role->contains($role)) {
                return true;
            }
        }
        return false;
    }

    public static function permission($permission): bool
    {
        $permission = Permission::whereHas('roles', function($q) {
            $q->where('user_role_id', Auth::user()->role_id);
        })->where('key', $permission)->first();

        if(!$permission)
        {
            return false;
        }

        return true;

    }
}
