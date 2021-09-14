<?php

namespace App\Traits;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait UploadFile
{
    public function removeFile($folderFile,$oldFile)
    {
        if($oldFile != null)
        {
            Storage::delete("public/files/$folderFile/" . $oldFile);
        }
    }

    public function uploadFile($file,$folderFile = null,$oldFile = null)
    {
        if($file == null) { return; }

        $this->removeFile($folderFile,$oldFile);
        if($folderFile != null)
        {
            $this->folderFile = $folderFile;
        }
        else
        {
            $folderFile = Str::random(6);
            $this->folderFile = $folderFile;
        }
        $filename = Str::random(10) . '.' . $file->getClientOriginalExtension();
        $file->storeAs("public/files/$folderFile", $filename);
        $this->file = $filename;
        return $this;
//        dd($file,$this->folderFile,$this->file);
    }

    public function getFile() // вывод картинки
    {
        if($this->file == null)
        {
            return '/img/no-image.png';
        }

        return Storage::url("files/$this->folderFile/$this->file");
    }
}
