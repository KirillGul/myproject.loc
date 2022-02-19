<?php

namespace MyProject\Controllers;

use MyProject\Models\Articles\Article;
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
        //Простой ORM
        //$articles = $this->db->query('SELECT * FROM `articles`;', [], Article::class);

        //Active Record
        $articles = Article::findAll();

        //var_dump($articles);

        $this->view->renderHtml('main/main.php', [
            'articles' => $articles,
        ]);
    }

    /**
     * Функция приветствия
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
