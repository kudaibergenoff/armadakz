<?php

namespace App\Traits;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;

trait AddEdit
{
    public static function add($fields,$status = true) // Добавление
    {
        $add = new static;
        if($status != false)
        {
            $fields['isActive'] = (isset($fields['isActive']) and $fields['isActive'] == "on") ? 1 : 0 ;
        }
        $add->fill($fields);

        return $add;
    }

    public function edit($fields,$status = true) // Изменение
    {
        if($status != false)
        {
            $fields['isActive'] = (isset($fields['isActive']) and $fields['isActive'] == "on") ? 1 : 0 ;
        }
        $this->fill($fields);
    }

    public function views($key,$time = 3600)
    {
        if (!Cache::has($key)) {
            Cache::put($key, 'true', $time);
            $this->increment('views');
        }
    }
}
