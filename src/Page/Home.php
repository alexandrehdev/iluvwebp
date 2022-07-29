<?php

namespace Conversor\Webp\Page;
use Conversor\Webp\Utils\View;
use Conversor\Webp\Controller\Conversor;

class Home{
    
    public static $checkImg = 'resources/img/';


	public static function nameElements() :array{
		$elements = View::getNameElements();
		$elements = array_map(function($item){
        return basename($item,'.html');
		},$elements);

		rsort($elements);

		return $elements;
    }

    public static function getHome() :void{
        $elements = self::nameElements();
	    $contents = View::getElements();

	    echo View::render('index',[
	        $elements[0] => $contents[0], 
	        $elements[1] => $contents[1], 
            $elements[2] => $contents[2] 
         ]);
    }

    public static function getDownload(){
         $elements = self::nameElements();
         $contents = View::getElements();

         echo View::render('index',[
	        $elements[0] => $contents[0], 
	        $elements[1] => $contents[3], 
            $elements[2] => $contents[2], 
         ]);
    }

}
