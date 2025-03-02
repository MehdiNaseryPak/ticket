<?php

namespace App\Services\Image;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

class ImageUpload
{
    public static function save($image, $path)
    {
        if ($image)
        {
            $name = $image->hashName();
            $extension = $image->extension();
            $imageSmall = Image::read($image)->resize(300, 200);
            $imageBig = Image::read($image);
            Storage::disk('local')->put($path . '/small/' . $name, $imageSmall->encodeByExtension($extension ?? 'png',quality : 90));
            Storage::disk('local')->put($path . '/big/' . $name, $imageBig->encodeByExtension($extension ?? 'png',quality : 90));
            return $name;
        }
        return false;
    }
}
