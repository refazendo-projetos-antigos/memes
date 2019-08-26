<?php

$dotenv = Dotenv\Dotenv::create(__DIR__.'/../');
$dotenv->load();

define("HOST_NAME", getenv('HOST_NAME') ?: 'localhost');
define("HOST_USER", getenv('HOST_USER') ?: 'root');
define("HOST_PASS", getenv('HOST_PASS') ?: '');
define("HOST_BD", getenv('HOST_BD') ?: 'memes');
