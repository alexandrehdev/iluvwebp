<?php
use Conversor\Webp\Controller\Conversor;
use Conversor\Webp\Page\Home;
$routes = [];

route('/', function(){
    return Home::getHome();
});

route('/sendImage',function(){

});


function route(string $path, callable $callback){				
    global $routes;
    $routes[$path] = $callback;
}              

run();

function run(){
    global $routes;
	$url = $_SERVER['REQUEST_URI'];
	foreach ($routes as $path => $callback){
		if ($path !== $url) continue;
		$callback();
	}
}
