<?php

namespace App\Interfaces;

interface ImageServiceInterface
{
    public function resizeImage($path, $width, $height);

    public function deleteImage($path);
}

?>