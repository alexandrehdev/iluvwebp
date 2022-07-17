<?php

namespace Conversor\Webp\Page;
use Conversor\Webp\Utils\View;

class Home{
	public static function nameElements() :array{
		$elements = View::getNameElements();
		$elements = array_map(function($item){
        return basename($item,'.html');
		},$elements);

		rsort($elements);

		return $elements;
	}


	public static function getHome(){

		$elements = self::nameElements();
		$content = View::getElements();
		foreach(){
			
		}
	}
}


