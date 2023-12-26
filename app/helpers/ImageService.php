<?php

namespace App\Helpers;
use Intervention\Image\Facades\Image;

class ImageService implements ImageServiceInterface
{

    public function resizeImage($image, $width, $height)
    {
        try {
            return Image::make($image)->resize($width, $height)->encode('jpg', 75);
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function deleteImage($image)
    {
        try {
            unlink($image);
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

}

?>