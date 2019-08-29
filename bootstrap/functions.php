<?php

function route(string $route) {
  return (new ReflectionClass('App\Main\Route'))->newInstanceArgs(func_get_args());
}

function view(string $path) {
  return (new ReflectionClass('App\Main\View'))->newInstanceArgs(func_get_args());
}
