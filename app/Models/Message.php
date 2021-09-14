<?php

namespace App\Models;

use App\Traits\AddEdit;
use App\Traits\IsBoolean;
use App\Traits\Scopes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    use AddEdit;
    use Scopes;
    use IsBoolean;

    protected $dates = ['answer_at','created_at','updated_at'];

    protected $fillable = [
        'name','email','message','answer'
    ];
}
