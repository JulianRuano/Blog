<?php

namespace App\Interfaces;

interface ImageServiceInterface
{
    public function resizeImage($image, $width, $height);

    public function deleteImage($image);
}

?>