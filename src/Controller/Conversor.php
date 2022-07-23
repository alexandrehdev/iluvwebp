<?php
namespace Conversor\Webp\Controller;

 class Conversor{                    

     public $image; 

     function __construct() 
     {
        $this->setImage($_FILES['fileToUpload']);
     }

     public function setImage(array $image) :void{
       $this->image = $image;
     }

     public function getImage() :array{
        return $this->image;
     }
	
 }
