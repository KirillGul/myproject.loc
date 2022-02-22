<?php

return [
    '~^hello/(.*)$~' => [\MyProject\Controllers\MainController::class, 'sayHello'],
    '~^article/(\d+)$~' => [\MyProject\Controllers\ArticlesController::class, 'view'], //просмотр статьи
    '~^article/(\d+)/edit$~' => [\MyProject\Controllers\ArticlesController::class, 'edit'], //изменения статьи
    '~^$~' => [\MyProject\Controllers\MainController::class, 'main'], //главная страница
];
