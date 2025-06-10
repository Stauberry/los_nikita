<?php

use app\Controllers\UserController;

//require_once '../vendor/autoload.php';
require_once '../app/Controllers/UserController.php';
//$is_route = true;

try {
    $request_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); //оставляет только путь без параметров
//    $request_uri = explode('/', $request_uri);
    $request_uri = trim($request_uri, '/');
//    мы забрали из урла параметры которые в дальнейшем будут обозначать какой класс за что будет отвечать

    echo '<pre>';
    var_dump($request_uri);
    echo '</pre>';
//    die();
    $routes = require_once 'web.php';

    if (array_key_exists($request_uri, $routes)) {
        var_dump($routes[$request_uri]);

        $route = $routes[$request_uri];
        $class = 'app\Controllers\\' . $route['controller']; //тут указан прямой путь и хз на сколько это верно, но работает
        $function = $route['action'];

        //проверка есть ли такой класс
        if(class_exists($class)){
//            $new = new NewsController(); вместо этого пишем динамическое название класса ниже
            $controller = new $class();

            if(method_exists($controller, $function)){
                $controller->$function();
            } else {
                throw new Exception("Method {$function} does not exist" , 2222);
            }

        } else {
            throw new Exception("Class {$class} does not exist | Page not found" , 10000);
        }

    } else {
        throw new Exception('Page not found', 404);
    }
} catch (Exception $e) {
    file_put_contents('exceptions.txt', json_encode([
            'message' => $e->getMessage(),
            'code' => $e->getCode(),
        ]) . PHP_EOL, FILE_APPEND);
    include '../app/Views/404.php';
}
die();
