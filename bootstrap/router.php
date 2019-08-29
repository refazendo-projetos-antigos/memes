<?php

use App\Main\Route as Route;

require __DIR__.'/../sources/routes.php';

$response = null;

$route = Route::find(URI);

$data = $route['data'] ?? [];

if(isset($route['controller']))
{
  $controller = $route['controller'];
  $controller[0] = "App\\Sources\\Controllers\\{$controller[0]}";
  if(!method_exists($controller[0], $controller[1])) {
    $controller = ["App\\Sources\\Controllers\\Error",'notFound'];
  }
  list($controller, $method) = $controller;
  $response = call_user_func_array([new $controller, $method], $data);
  $response = is_a($response, 'App\Main\View')? $response->run(): $response;
}

if(isset($route['callable']))
{
  $callable = $route['callable'];
  $response = call_user_func_array($callable, $data);
}

echo $response;
