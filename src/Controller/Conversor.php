<?php
namespace Conversor\Webp\Controller;

 class Conversor{                    

     public $image;

     function __construct()
     {
         $this->setImage($_FILES['fileToUpload']);
     }

     public function getImage(){
         return $this->image;
     }

     public function setImage($image) {
        $this->image = $image;
     }

     public function convertImage(){
      $image = $this->getImage();
        switch($image["type"]){
            case "image/png":
                $this->PngToWebp($image);
                break;
            case "image/jpeg":
                $this->JpgToWebp($image);
                break;              
        }
     }

     public function moveImage(array $img, string $type){
         $target = "resources/img/{$type}/{$img['name']}";
         move_uploaded_file($img['tmp_name'], $target);
     }

     public function JpgToWebp($img){
         $types = [".jpg",".jpeg"];
         $image = $this->getImage();
         $this->moveImage($image, "jpeg");
         $imagePath = "resources/img/jpeg/{$img['name']}";
         $image = imagecreatefromjpeg($imagePath);
         foreach($types as $type){
            $newImage = str_replace($type,".webp",$imagePath);
         }
         $quality = 100;
         imagewebp($image,$newImage,$quality);
         unlink($imagePath);
     }

     public function PngToWebp($img){
         $image = $this->getImage();
         $this->moveImage($image, "png");
         $imagePath = "resources/img/png/{$img['name']}";
         $image = imagecreatefrompng($imagePath);
         $newImage = str_replace(".png",".webp",$imagePath);
         $quality = 100;
         imagewebp($image,$newImage,$quality);
         unlink($imagePath);
     }                         
    


	
 }
