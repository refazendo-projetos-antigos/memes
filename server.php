<?php

/**
 * If this URL is a file into public directory, return false to then print this
 */
$uri = urldecode(
  parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);

if($uri !== '/' && preg_match('/^\/public\//', $uri) && file_exists(__DIR__.'/'.$uri)) {
  return false;
}

define('URI', $uri);

require_once __DIR__ . '/vendor/autoload.php';
