<?php

namespace App\Models;

use App\Traits\AddEdit;
use App\Traits\IsBoolean;
use App\Traits\Scopes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;
    use AddEdit;
    use Scopes;
    use IsBoolean;

    protected $fillable = [
        'isActive','type','index',
        'title','description'
    ];

}
