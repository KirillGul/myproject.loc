<?php

spl_autoload_register(function (string $className) {
    require_once __DIR__ . '/../src/' . str_replace('\\', '/', $className) . '.php';
});

$route = $_GET['route'] ?? '';
$routes = include_once __DIR__ . '/../src/routes.php';

$isRouteFound = false;
foreach ($routes as $pattern => $controllerAndAction) {
    preg_match($pattern, $route, $matches); //будет не пустое даже без аргументов, когда найдет общее совпадение
    if (!empty($matches)) { //и в $matches сохраняються аргументы
        $isRouteFound = true;
        break;
    }  
}

if (!$isRouteFound) {
    echo 'Страница не найдена!';
    return;
}

unset($matches[0]);

$controllerName = $controllerAndAction[0]; //узнаем имя контроллера
$actionName = $controllerAndAction[1]; //узнаем имя действия

$controller = new $controllerName(); //создаем объект контроллера
$controller->$actionName(...$matches); //запускаем дейсвие и передаем аргументы
