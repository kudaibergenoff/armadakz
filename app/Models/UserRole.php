<?php

namespace App\Models;

use App\Traits\AddEdit;
use App\Traits\Scopes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    use HasFactory;

    use AddEdit;
    use Scopes;

    const USER = 1;
    const SELLER = 2;
    const ADMIN = 3;

    protected $table = 'user_roles';

    protected $fillable = [
        'title',
    ];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'roles_permissions');
    }
}
