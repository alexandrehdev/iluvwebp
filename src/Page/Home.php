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


	public static function getHome() :string{

		$elements = self::nameElements();
		$contents = View::getElements();

		return View::render('index',[
			$elements[0] => $contents[0],
			$elements[1] => $contents[1],
			$elements[2] => $contents[2]
		]);

	}

}


