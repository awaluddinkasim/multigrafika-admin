<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;

trait ImageFile
{
    public function uploadImage($file, $path)
    {
        $fileName = time() . '.' . $file->extension();
        $file->move(public_path($path), $fileName);
        return $fileName;
    }

    public function deleteImage($path)
    {
        if (file_exists(public_path($path))) {
            File::delete(public_path($path));
        }
    }
}
