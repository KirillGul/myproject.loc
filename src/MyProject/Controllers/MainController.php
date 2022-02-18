<?php

namespace MyProject\Controllers;

use MyProject\View\View;
use MyProject\Services\Db;

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
     * Содержит объект класса Db
     */
    private Db $db;

    /**
     * Создание объекта View и передача пути к папке с шаблонами
     */
    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../../../templates/');
        $this->db = new Db;
    }

    /**
     * Действие для главной страницы сайта
     */
    public function main()
    {
        $articles = $this->db->query('SELECT * FROM `articles`;');
        
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
