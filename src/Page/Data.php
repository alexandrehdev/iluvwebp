<?php
namespace Conversor\Webp\Page;
use Conversor\Webp\Page\Home;
use Conversor\Webp\Controller\Conversor;


class Data{
    
    public static function getMainPage(){
        echo Home::getHome();
    }

    public static function convertInPage(){
       (new Conversor())->convertImage();         
    }
   
}
