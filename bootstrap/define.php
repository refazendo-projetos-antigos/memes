<?php

session_start();
date_default_timezone_set(getenv('TIMEZONE') ?: 'America/Sao_Paulo');

$dotenv = Dotenv\Dotenv::create(__DIR__.'/../');
$dotenv->load();

define("HOST_NAME", getenv('HOST_NAME') ?: 'localhost');
define("HOST_USER", getenv('HOST_USER') ?: 'root');
define("HOST_PASS", getenv('HOST_PASS') ?: '');
define("HOST_BD", getenv('HOST_BD') ?: 'memes');

$http = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']=='on'? 'https': 'http';
define('BASE', "{$http}://{$_SERVER['HTTP_HOST']}/");
