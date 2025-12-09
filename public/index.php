<?php

    require_once __DIR__ . '/../vendor/autoload.php';

    $router = new AltoRouter();

    $router->map('GET', '/', function() {
        echo "Home page works!";
    });

    $router->map('GET', '/about', function() {
        echo "About page works!";
    });

    $match = $router->match();         

    if($match) {
        call_user_func_array($match['target'], $match['params']);
    } else {
        header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
        echo 'Route not found';
    }
