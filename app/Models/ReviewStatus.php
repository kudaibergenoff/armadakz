<?php

namespace App\Models;

use App\Traits\AddEdit;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewStatus extends Model
{
    use HasFactory;

    use AddEdit;

    protected $fillable = [
        'title',
    ];

    const NEW = 1; // Ожидает модерации
    const ACTIVE = 2; // Активный
    const NOT_ACTIVE = 3; // Не активный
    const LOCKED = 4; // Не одобренный
}
