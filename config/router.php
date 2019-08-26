<?php

use App\Main\Route as Route;

require __DIR__.'/../sources/routes.php';

$route = Route::find(URI);

dd($route);
