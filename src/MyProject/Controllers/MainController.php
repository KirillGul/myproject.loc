<?php

namespace MyProject\Controllers;

use MyProject\View\View;

/**
 * Класс главной страницы сайта
 */
class MainController
{
    /**
     * Содержит объект класса View
     */
    private View $view;

    /**
     * Создание объекта View и передача пути к папке с шаблонами
     */
    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../../../templates/');
    }

    /**
     * Действие для главной страницы сайта
     */
    public function main()
    {
        $articles = [
            ['name' => 'Статья 1', 'text' => 'Текст статьи 1'],
            ['name' => 'Статья 2', 'text' => 'Текст статьи 2'],
        ];

        $this->view->renderHtml('main/main.php', [
            'articles' => $articles,
        ]);
    }

    /**
     * Функция приветствия
     * 
     * @param string $name ИмяПользователя
     */
    public function sayHello(string $name): void
    {
        $title = 'Страница приветствия';

        $this->view->renderHtml('main/hello.php', [
            'name' => $name,
            'title' => $title
        ]);
    }
}
