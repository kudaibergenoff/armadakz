<?php

namespace App\Models;

use App\Traits\AddEdit;
use App\Traits\Scopes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannerType extends Model
{
    use HasFactory;

    use AddEdit;
    use Scopes;

    const HOME_SLIDER = 1; // главная страница СЛАЙДЕР
    const HOME_TOP = 2; // главная страница центр-верх
    const HOME_BOTTOM = 3; // главная страница центр-низ
    const CATEGORY = 4; // страница категорий
    const WIDE_TOP = 7; // Верхний широкий баннер

    protected $table = 'banner_types';

    protected $fillable = [
        'isActive','title'
    ];
}
