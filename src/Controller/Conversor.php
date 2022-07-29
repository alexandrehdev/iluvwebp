<?php
namespace Conversor\Webp\Controller;

 class Conversor{                    

     public $image;

     function __construct()
     {
         $this->setImage($_FILES['image']);
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


     public function JpgToWebp($img) :void{
         $image = $this->getImage();
         $this->moveImage($image, "jpeg");
         $imagePath = "resources/img/jpeg/{$img['name']}";
         $image = imagecreatefromjpeg($imagePath);
         $file = end(explode("/", $imagePath));
         $extension = end(explode(".", $file));
         $newImage = str_replace("." . $extension, ".webp", $imagePath);
         $quality = 100;
         imagewebp($image,$newImage,$quality);
         /* $this->downloadLink($newImage); */
     }


     public function PngToWebp($img) :void{
         $image = $this->getImage();
         $this->moveImage($image, "png");
         $imagePath = "resources/img/png/{$img['name']}";
         $image = imagecreatefrompng($imagePath);
         $newImage = str_replace(".png",".webp",$imagePath);
         $quality = 100;
         imagewebp($image,$newImage,$quality);
     }                         


     public function isDirectoryEmpty() :bool{
        $types = ["jpeg","png"];
        $jpgDir = "resources/img/";

        foreach($types as $type){
           $data = scandir($jpgDir . $type);
           $dataValues = array_slice($data,2);
        }
        $numFiles = count($dataValues);
        $response = ($numFiles == 0) ? true : false;

        return $response;
     }

     public function downloadLink(string $pathDownload){
         $downloadHtml = "resources/elements/download.html";
         $content = "<a href='{$pathDownload}' download></a>";
         file_put_contents($downloadHtml,$content, FILE_APPEND);
     }
    


	
 }
