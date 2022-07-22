<?php
namespace Conversor\Webp\Web; 

class Router{

    public static $routes = [];

    public static function redirect(string $path,callable $callback) :void{
        self::$routes[$path] = $callback;
        var_dump(self::$routes);
        self::run(self::$routes);
    }

    public static function run(array $routes){
        $url = $_SERVER['REQUEST_URI'];
        foreach($routes as $path => $callback){
          if($path == $url){
            $callback();
        }
    }

    }
}
