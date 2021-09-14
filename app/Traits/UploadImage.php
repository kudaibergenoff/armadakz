<?php

namespace App\Traits;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait UploadImage
{
    public function removeImage($oldImage)
    {
        if($oldImage != null)
        {
            Storage::delete("public/" . $oldImage);
        }
    }

    public function uploadImage($image, $name = 'image', $oldImage = null)
    {
        if($image == null) { return; }
        $names = $name . 's';
        $this->removeImage($oldImage);
        $filename = Str::random(10) . '.' . $image->getClientOriginalExtension();
        $image->storeAs("public/$names", $filename);
        $this->$name = "$names" . '/' . $filename;
    }

    public function uploadDataImage($image, $name = 'image',$type = 'jpeg',$folder = null)
    {
        if($image == null) { return; }
//        $names = $name . 's';

        $oldImage = $this->getOriginal($name) ?? null;
        if($oldImage != $image)
        {
            $this->removeImage($this->getOriginal($name));
            $date = now()->format('MY');
            $folder = $folder != null ? $folder . '/' . $name . '/' : $name . '/';
            $folder = $folder . $date . '/';
            $image = str_replace('data:image/png;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            $filename = Str::random(10) . '.' . $type;
            $pathway = $folder . $filename;
            Storage::put("public/$pathway", base64_decode($image));
            $this->$name = $pathway;
        }
    }

    public function uploadDataImages($images, $name = 'images',$type = 'jpeg',$folder = null)
    {
        if(!is_array($images)) // если приходит не массив
        {
            $image[] = $images;
            $images = $image;
        }
        if($images == null) { return; } // or $images == '/storage/'.$this->getOriginal($name)
        $oldImages = is_array($this->getOriginal($name)) ? $this->getOriginal($name) : [];

        if(count(array_diff($oldImages,$images)) > 0)
        {
            foreach (array_diff($oldImages,$images) as $imageDel)
            {
                $this->removeImage($imageDel);
            }
        }

        $date = now()->format('MY');
        $folder = $folder != null ? $folder . '/' : null;
        $folder = $name . '/' . $folder . $date . '/';
        $imagesArray = null;

        for($i = 0; $i < count($images); $i++)
        {
            if(in_array($images[$i], $oldImages))
            {
                $imagesArray[] = $images[$i];
            }
            else
            {
                if($images[$i] != null)
                {
                    $image = str_replace('data:image/png;base64,', '', $images[$i]);
                    $image = str_replace(' ', '+', $image);
                    $filename = Str::random(10) . '.' . $type;
                    $pathway = $folder . $filename;
                    Storage::put("public/$pathway", base64_decode($image));
                    $imagesArray[] = "$pathway";
                }
            }
        }

        $this->$name = $imagesArray;
    }

    public function uploadImages($images, $name = 'image', $oldImage = null)
    {
        $names = $name . 's';
        if($images == null) { return; }
        foreach ($images as $image)
        {
            $this->removeImage($oldImage);
            $filename = Str::random(10) . '.' . $image->getClientOriginalExtension();
            $image->storeAs("public/$names", $filename);
            $imageArray[] = "$names" . '/' . $filename;
        }
        $this->$names = json_encode($imageArray);
    }

    public function getImage($name = 'image',$imageDefault = '/img/logo-gray.png') : string // вывод картинки
    {
//        dd($name,$imageDefault);
        if($this->$name == null)
        {
            return $imageDefault;
        }
        if(is_array($this->$name))
        {
            $first[] = $this->$name[0];
            $imageUrl = $this->storage($first[0],$imageDefault);
        }
        else
        {
            $imageUrl = $this->storage($this->$name,$imageDefault);
        }

        return $imageUrl;
    }

    public function getImages($number = 0, $name = 'images',$imageDefault = '/img/logo-gray.png') : string // вывод картинки
    {
        if($this->$name == null)
        {
            return $imageDefault;
        }

        if(is_array($this->$name))
        {
            $first[] = $this->$name[$number];
            $imageUrl = $this->storage($first[0],$imageDefault);
        }
        else
        {
            $imageUrl = $this->storage($this->$name,$imageDefault);
        }

        return $imageUrl;
    }

    public function storage($image,$imageDefault)
    {
        $imageUrl = Storage::exists('/public/'.$image) ? Storage::url($image) : $imageDefault;
        return  $imageUrl;
    }
}
