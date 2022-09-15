<?php
namespace Conversor\Webp\Controller;
use Conversor\Webp\Controller\Builder;

 class Conversor{                    
    
   public function imageData() :array{
      $builder = new Builder;
      $image = $builder->getImage();

      return $image;
   } 

   public function convertImage(){
      $image = $this->imageData();

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
       $image = $this->imageData();
       $this->moveImage($image, "jpeg");
       $imagePath = "resources/img/jpeg/{$img['name']}";
       $image = imagecreatefromjpeg($imagePath);
       $file = end(explode("/", $imagePath));
       $extension = end(explode(".", $file));
       $newImage = str_replace("." . $extension, ".webp", $imagePath);
       $quality = 100;
       $this->downloadLink($newImage);
       imagewebp($image,$newImage,$quality);
       unlink($imagePath);
     }

     public function PngToWebp($img) :void{
       $image = $this->imageData();
       $this->moveImage($image, "png");
       $imagePath = "resources/img/png/{$img['name']}";
       $image = imagecreatefrompng($imagePath);
       $newImage = str_replace(".png",".webp",$imagePath);
       $quality = 100;
       $this->downloadLink($newImage);
       imagewebp($image,$newImage,$quality);
       unlink($imagePath);
     }                         

     public function downloadLink(string $pathDownload) :void{
         $downloadHtml = "resources/elements/download.html";

         $content = "
                    <div id='download-area'>
                        <a name='downloadBtn'id='btnDown'href='{$pathDownload}'download>
                            Download Image <i class='fa-solid fa-download'></i>
                       </a>
                    </div>
                    ";

         file_put_contents($downloadHtml,$content);
     }


	
 }
