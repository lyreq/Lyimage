<?php
//LyImage v0.1 by Yasin Timur
//contact : infoyasintimur@gmail.com
//date : 06/2021
class LyImage
{
    public $file; // image

    public function __construct($file)
    {
        $this->file = $file;
        $this->type = strtolower(strrchr($this->file, '.'));

        function getWidth($files)
        {
            list($height) = getimagesize($files);
            return $height;
        }
        function getHeight($files)
        {
            list($width) = getimagesize($files);
            return $width;
        }
        function getfileType($files)
        {
            // This function for find file type. Like image/jpeg
            $array = getimagesize($files);
            return $array['mime'];
        }
    }
    public function getWidth()
    {
        list($height) = getimagesize($this->file);
        return $height;
    }
    public function getHeight()
    {
        list($width) = getimagesize($this->file);
        return $width;
    }

    public function check()
    {
        // Don't forget.This function work just jpg,jpeg,gif,webp and png image type.Does not work other image types.You must look first image type from type() function.If response type jpg,jpeg,gif,webp or png , we can use check() function.
        //  IMG_BMP,IMG_GIF,IMG_JPG,IMG_PNG,IMG_WBMP,IMG_XPM,IMG_WEBP image files supports PHP
        $fileType = $this->type;
        switch ($fileType) {
            case '.jpg':
            case '.jpeg':
                $im = @imagecreatefromjpeg($this->file);
                break;
            case '.gif':
                $im = @imagecreatefromgif($this->file);
                break;
            case '.webp':
                $im = @imagecreatefromwebp($this->file);
                break;
            case '.png':
                $im = @imagecreatefrompng($this->file);
            default:
                $im = false;
                break;
        }
        return $im;
    }

    function convert($outputImage, $quality = 100)
    {
        $originalImage = $this->file;
        // jpg, png, gif or bmp?
        $exploded = explode('.', $originalImage);
        $ext = $exploded[count($exploded) - 1];

        if (preg_match('/jpg|jpeg/i', $ext)) {
            $imageTmp = imagecreatefromjpeg($originalImage);
        } else if (preg_match('/png/i', $ext)) {
            $imageTmp = imagecreatefrompng($originalImage);
        } else if (preg_match('/gif/i', $ext)) {
            $imageTmp = imagecreatefromgif($originalImage);
        } else if (preg_match('/bmp/i', $ext)) {
            $imageTmp = imagecreatefrombmp($originalImage);
        } else {

            return false;
        }


        // quality is a value from 0 (worst) to 100 (best)
        imagejpeg($imageTmp, $outputImage, $quality);
        imagedestroy($imageTmp);

        return true;
    }
    public function fileType()
    {
        // This function for find file type.Like image/jpeg,image/PNG
        $array = getimagesize($this->file);
        return $array['mime'];
    }
    public function extension()
    {
        // This function for find file extension.Like .jpg,.png
        return $this->type;
    }
    public function compressImage($quality)
    {
        $originalImage = $this->file;
        $outputImage = $this->file;
        // jpg, png, gif or bmp?
        $exploded = explode('.', $originalImage);
        $ext = $exploded[count($exploded) - 1];

        if (preg_match('/jpg|jpeg/i', $ext)) {
            $imageTmp = imagecreatefromjpeg($originalImage);
        } else if (preg_match('/png/i', $ext)) {
            $imageTmp = imagecreatefrompng($originalImage);
        } else if (preg_match('/gif/i', $ext)) {
            $imageTmp = imagecreatefromgif($originalImage);
        } else if (preg_match('/bmp/i', $ext)) {
            $imageTmp = imagecreatefrombmp($originalImage);
        } else {

            return false;
        }


        // quality is a value from 0 (worst) to 100 (best)
        imagejpeg($imageTmp, $outputImage, $quality);
        imagedestroy($imageTmp);

        return true;
    }

    public function resizingImage($width, $height)
    {
        $original = imagecreatefromjpeg($this->file);
        $resized = imagecreatetruecolor($width, $height);
        imagecopyresampled($resized, $original, 0, 0, 0, 0, $width, $height, getWidth($this->file), getHeight($this->file));
        $response =  imagejpeg($resized, $this->file);
        return $response;
    }

    function uploadImage($name,$filePath = "")
    {
        if (empty($filePath)) {
            $filePath = "";
        } else {
            if (trim(substr($filePath, -1)) != "/") {
                $filePath = $filePath . "/";
            }
        }
        $original = imagecreatefromjpeg($this->file);
        $resized = imagecreatetruecolor(getWidth($this->file), getHeight($this->file));
        imagecopyresampled($resized, $original, 0, 0, 0, 0, getWidth($this->file), getHeight($this->file), getWidth($this->file), getHeight($this->file));
        $response =  imagejpeg($resized, $filePath . $name . $this->type);
        return $response;
    }
}
