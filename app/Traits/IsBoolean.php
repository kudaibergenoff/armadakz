<?php

namespace App\Traits;

trait IsBoolean
{
    public function isBoolean($request,$name)
    {
        $this->$name = ($request->has($name) and $request->$name == 'on') ? true : false;
    }
}
