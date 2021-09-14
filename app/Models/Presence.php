<?php

namespace App\Models;

use App\Traits\AddEdit;
use App\Traits\Scopes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presence extends Model
{
    use HasFactory;

    use AddEdit;
    use Scopes;

    protected $fillable = [
        'is_active',
        'title',
    ];
}
