<?php

namespace App\Main;

class Route
{
  private static $routes = [];
  private static $actual = null;

  public function __construct(string $route, $second=null)
  {
    $route = trim($route, '/');
    $count = substr_count($route, '/');
    if(is_string($second)) {
      $controller = strpos($second, '@')>=0? explode('@', $second) : [$second,'index'];
      self::$routes[$count][$route]['controller'] = $controller;
    }
    if(is_callable($second)) {
      self::$routes[$count][$route]['callable'] = $second;
    }
  }

  public static function find(string $uri)
  {
    $uri = trim($uri, '/');
    if($uri=='' and isset(self::$routes[''])) {
      self::$actual = self::$routes[''];
      return self::$routes[''];
    }
    return self::search($uri);
  }

  public static function search(string $uri)
  {
    $count = substr_count($uri, '/');
    $routes = self::$routes[$count] ?? [];
    foreach($routes as $route => $data) {
      self::$actual = $data;
      return $data;
    }
    self::$actual = [
      'controller' => ['Error','notFound']
    ];
    return self::$actual;
  }

}
