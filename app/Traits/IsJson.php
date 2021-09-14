<?php


namespace App\Traits;


trait IsJson
{
    public function isJson($request,$name)
    {
        $this->$name = $request->has($name) ? $request->$name : null;
//        dd($request->$name, json_encode($request->$name));
    }
}
