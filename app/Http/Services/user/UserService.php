<?php

namespace App\Http\Services\user;

class UserService
{
    public function phones($request)
    {
        $phones = [];
        foreach (['phone','phones'] as $name)
        {
            $phones = array_merge($phones, $this->intoArray($request,$name));
        }
        $phones = array_filter($phones);
        return $phones;
    }

    public function intoArray($request,$names)
    {
        $datas = [];
        if($request->has($names))
        {
            foreach ((array) $request->$names as $name)
            {
                $datas[] = $name;
            }
        }

        return $datas;
    }
}
