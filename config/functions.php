<?php

function route(string $route) {
  return (new ReflectionClass('App\Main\Route'))->newInstanceArgs(func_get_args());
}
