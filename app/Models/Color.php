<?php

namespace App\Models;

use App\Traits\AddEdit;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    use AddEdit;
    protected $table = 'colors';

    protected $fillable = [
        'rgb','slug','title_ru','title_kz','title_en'
    ];
}
