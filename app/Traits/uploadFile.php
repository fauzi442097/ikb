<?php
namespace App\Traits;

use Image;

trait UploadFile {

    public function uploadImage($file, $destPath)
    {
        $destinationPath = public_path($destPath);
        $img = Image::make($file);
        $imageDimensions = getimagesize($file);
        $width = $imageDimensions[0];
        $height = $imageDimensions[1];
        $new_width = $imageDimensions[0] * 0.5;
        $new_height = ceil($height * ($new_width / $width));
        $img->orientate()->resize($new_width, $new_height, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath); // Second param quality of image start from 0 .. 100
    }

    public function removeFile($path) {
        if ( file_exists($path)) unlink($path);
    }

}
