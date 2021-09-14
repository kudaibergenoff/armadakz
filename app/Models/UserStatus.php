<?php

namespace App\Models;

use App\Traits\AddEdit;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserStatus extends Model
{
    use HasFactory;

    use AddEdit;

    const ACTIVE = 1;
    const CONFIRMED = 2;
    const LOCKED = 3;
    const REMOTE = 4;
}
