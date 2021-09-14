<?php

namespace App\Models;

use App\Traits\AddEdit;
use App\Traits\Scopes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerType extends Model
{
    use HasFactory;

    use AddEdit;
    use Scopes;

    protected $fillable = [
        'ststus','title_ru','title_kz','title_en'
    ];
}
