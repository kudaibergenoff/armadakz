<?php

namespace App\Traits;

use Illuminate\Support\Facades\App;

trait Translates
{
    public function lang($name, $is_this = null)
    {
        $locale = App::getLocale() ?? 'ru';
        $name .= '_' . App::getLocale();

        return $is_this == null ? $this->$name : $name;

    }
}
