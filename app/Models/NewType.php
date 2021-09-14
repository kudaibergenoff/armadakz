<?php

namespace App\Models;

use App\Traits\AddEdit;
use App\Traits\IsBoolean;
use App\Traits\Scopes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewType extends Model
{
    use HasFactory;
    use AddEdit, Scopes, IsBoolean;

    protected $fillable = [
        'is_active','title'
    ];

    const NEW = 1; // Новость
    const ARTICLE = 2; // Статья
    const VIDEO = 3; // Видео
}
