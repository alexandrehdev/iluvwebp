<?php
 use Conversor\Webp\Page\Home;
 use Conversor\Webp\Web\Router; 
    
 Router::redirect('/',function(){
     echo "data";
 });

 Router::redirect('/teste',function(){
   echo "tchurusbango";
 });
