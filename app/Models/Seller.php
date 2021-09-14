<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Seller extends Authenticatable
{
    use Notifiable;

    protected $table = 'sellers';
    protected $guard = 'seller';

    protected $fillable = [
        'isActive','store_id',
        'name',
        'email',
        'password'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function stores()
    {
        return $this->hasMany(Store::class);
    }

//    protected function reviews()
//    {
//        return $this->hasMany(Review::class);
//    }

//    public function posts()
//    {
//        return $this->hasMany(Sellers\Post::class);
//    }


}
