<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\AddEdit;

class Permission extends Model
{
    use HasFactory;
    //use AddEdit;
    protected $table = 'permissions';

    protected $guarded = [];

    public function roles()
    {
        return $this->belongsToMany(UserRole::class, 'roles_permissions');
    }
}
