<?php

namespace App\Models;

use App\Traits\AddEdit;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mailing extends Model
{
    use HasFactory;

    use AddEdit;

    protected $fillable = [
        'user_id',
        'title','text'
    ];
}
