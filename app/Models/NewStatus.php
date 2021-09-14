<?php

namespace App\Models;

use App\Traits\AddEdit;
use App\Traits\IsBoolean;
use App\Traits\Scopes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewStatus extends Model
{
    use HasFactory;

    use AddEdit, Scopes, IsBoolean;

    protected $fillable = [
        'is_active','color','title'
    ];

    const MODERATION = 1;
    const DRAFT = 2;
    const APPROVED = 3;
    const DISABLED = 4;
}
