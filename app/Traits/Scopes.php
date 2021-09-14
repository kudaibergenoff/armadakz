<?php

namespace App\Traits;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;

trait Scopes
{
    public function scopeIsActive($query, $status = 1)
    {
        return $query->where('isActive',$status);
    }
}
