<?php

    require_once __DIR__ . '/../vendor/autoload.php';

    use App\Controllers\BlogController;

    $router = new AltoRouter();

    // frontend
    $router->map('GET', '/blog/list', ['App\Controllers\BlogController' , 'list']);
    $router->map('GET', '/blog/create', ['App\Controllers\BlogController' , 'create']);
    $router->map('GET', '/blog/edit/[i:id]', ['App\Controllers\BlogController' , 'edit']);
    $router->map('GET', '/blog/show/[i:id]', ['App\Controllers\BlogController' , 'show']);

    // Api
    $router->map('GET' , '/api/blogs' , ['App\Controllers\BlogController' , 'list']);
    $router->map('GET' , '/api/blogs/[i:id]' , ['App\Controllers\BlogController' , 'show']);
    $router->map('POST' , '/api/blogs' , ['App\Controllers\BlogController' , 'store']);
    $router->map('PUT' , '/api/blogs/[i:id]' , ['App\Controllers\BlogController' , 'update']);
    $router->map('DELETE' , '/api/blogs/[i:id]' , ['App\Controllers\BlogController' , 'delete']);

    $method = $_SERVER['REQUEST_METHOD'];

    if ($method === 'POST' && isset($_POST['_method'])) {
        $method = strtoupper($_POST['_method']); // e.g., PUT
    }


    $match = $router->match(null, $method);         


    if ($match) {
        $target = $match['target'];

        if (is_array($target)) {
            $controller = new $target[0]();    // instantiate the controller
            call_user_func_array([$controller, $target[1]], $match['params']);
        } else {
            call_user_func_array($target, $match['params']);
        }
    } else {
        header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
        echo 'Route not found';
    }

