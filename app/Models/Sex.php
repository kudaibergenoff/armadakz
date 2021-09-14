<?php

namespace App\Models;

use App\Traits\AddEdit;
use App\Traits\Scopes;
use Illuminate\Database\Eloquent\Model;

class Sex extends Model
{
    use AddEdit;
    use Scopes;

    protected $table = 'sexes';

    protected $fillable = [
        'title_ru','title_kz','title_en',
    ];
}
