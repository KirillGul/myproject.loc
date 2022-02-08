<?php

/*
require __DIR__ . '/../src/MyProject/Models/Users/User.php';
require __DIR__ . '/../src/MyProject/Models/Articles/Article.php';
*/

use MyProject\Controllers\MainController;

spl_autoload_register(static function (string $class) {
    $class = str_replace('\\', '/', $class); //В операционной системе Windows используются обратные слеши, а в операционной системе Linux используются прямые слеши. И операционная система Windows прекрасно понимает оба варианта, но для Linux важны прямые слеши. Если код запустить на Linux, на котором работают большинство серверов, то у нас ничего работать не будет. Напишем функцию, мы ищем обратные слеши и заменяем их на прямые

    $file = __DIR__ . '/../src/' .$class. '.php'; //Можем посмотреть путь если перед переменной $file добавить echo. Имя класса преобразуется в путь.

    //Проверка: существует ли файл по указанному пути
    if (file_exists($file)) {
        require_once $file;
    }
});

/*
$author = new \MyProject\Models\Users\User('Иван');
$article = new \MyProject\Models\Articles\Article('Заголовок', 'Текст', $author);
var_dump($article);
*/
/*
$controller = new MainController;
if (!empty($_GET['name'])) {
    $controller->sayHello($_GET['name']);    
} else {
    $controller->main();
}
*/

$route = $_GET['route'] ?? '';
$routes = require __DIR__ . '/../src/routes.php';
var_dump($routes);
