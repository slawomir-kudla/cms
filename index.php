<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';

function pr($text){
    echo "<pre>";
    print_r($text);
    echo "</pre>";
}


$app = new \Slim\App;
$app->get('/m/{module}[/[{method}[/[{p1}[/[{p2}[/[{p3}[/]]]]]]]]]', function (Request $request, Response $response) {
    
//    pr($request->getAttribute('module'));
//    pr($request->getAttribute('method'));
//    pr($request->getAttribute('p1'));
//    pr($request->getAttribute('p2'));
//    pr($request->getAttribute('p3'));
//    
//    pr($_GET);
//    
//    $name = $request->getAttribute('name');
//    $response->getBody()->write("Hello, $name");

    $moduleName = $request->getAttribute('module');
    
    require_once 'app/controller.php';
    
    if (file_exists("modules/{$moduleName}/index.php")) {  
        require_once "modules/{$moduleName}/index.php";
        
        $obiekt = new $moduleName();
        $obiekt->method = $request->getAttribute('method');
        $obiekt->execiutMethod();
        
    } else {
        echo "nie ma modułu";
    }
    
    return $response;
});
$app->run();