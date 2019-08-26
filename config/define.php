<?php

switch ($_SERVER['SERVER_NAME']) {
    case 'localhost':
        define("HOST_NAME", "localhost");
        define("HOST_USER", "root");
        define("HOST_SENHA", "admin");
        define("HOST_BD", "memes");
        break;
    
    default:
        
        break;
    
}