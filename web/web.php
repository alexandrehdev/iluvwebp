<?php
use Conversor\Webp\Page\Home;
$routes = [];
route('/', function(){
    Home::getHome();
});

route('/convert',function(){
    Home::getDownload();
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

