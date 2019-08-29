<?php

namespace App\Main;

class Route
{
  private $route = null;
  private static $routes = [];
  private static $actual = null;
  private static $rules = [
    'id' => '([0-9]{1,})',
    'slug' => '([a-zA-Z0-9\-_]{3,})',
    'post' => '([0-9]{1,})\-([a-zA-Z0-9\-_]{3,})',
    'date' => '([0-9]{2})\/([0-9]{2})\/([0-9]{4})',
  ];

  public function __construct(string $route, $second=null)
  {
    global $self;
    if(isset($self->route) and $self->route!=null) {
      $route = $self->route . ($route[0]=='/'? '': '/') . $route;
    }
    $this->route = trim($route, '/');
    $count = substr_count($this->route, '/');
    if(is_string($second)) {
      $controller = strpos($second, '@')>=0? explode('@', $second) : [$second,'index'];
      self::$routes[$count][$this->route]['controller'] = $controller;
    }
    if(is_callable($second)) {
      self::$routes[$count][$this->route]['callable'] = $second;
    }
    return $this;
  }

  /**
   * Childdrens of a route
   *
   * @param callable $callable
   * @return void
   */
  public function childdrens(callable $callable)
  {
    global $self;
    $self = $this;
    $callable();
  }

  /**
   * Find the actual route
   *
   * @param string $uri
   * @return void
   */
  public static function find(string $uri)
  {
    $uri = trim($uri, '/');
    if($uri=='' and isset(self::$routes[''])) {
      self::$actual = self::$routes[''];
      return self::$routes[''];
    }
    return self::search($uri);
  }

  /**
   * Search in routes to find the actual
   *
   * @param string $uri
   * @return void
   */
  protected static function search(string $uri)
  {
    $count = substr_count($uri, '/');
    $routes = self::$routes[$count] ?? [];
    foreach($routes as $route => $data) {
      $data['url'] = $route;
      if(preg_match_all('/\{(.*)\}/Ui', $route, $matches)) {
        $route = str_replace('/', '\/', $route);
        foreach($matches[1] as $index => $match) {
          if(!isset(self::$rules[$match])) {
            break;
          }
          $replace = $matches[0][$index];
          $value = self::$rules[$match];
          $route = str_replace($replace, $value, $route);
        }
        if(preg_match("/^{$route}$/", $uri, $matches)) {
          array_shift($matches);
          self::$actual = array_merge($data, [
            'data' => $matches
          ]);
          return self::$actual;
        }
        continue;
      }
      if($route==$uri) {
        self::$actual = $data;
        return self::$actual;
      }
    }
    self::$actual = [
      'url' => 'not-found',
      'controller' => ['Error','notFound']
    ];
    return self::$actual;
  }

}
