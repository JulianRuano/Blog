<?php

namespace App\Helpers;
use Illuminate\Support\Facades\Storage;
use App\Interfaces\ImageServiceInterface;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;


class ImageService implements ImageServiceInterface
{
    function resizeImage($fileName, $width, $height) {
        Storage::disk('local')->copy('public/images/' . $fileName, 'public/images/miniature/' . $fileName);
        
        $manager = new ImageManager(new Driver());
        $img = $manager->read('storage/images/miniature/' . $fileName);
        $img->resize($width, $height);
        $img->toPng()->save('storage/images/miniature/' . $fileName);
       
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