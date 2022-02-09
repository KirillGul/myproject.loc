<?php

namespace MyProject\Controllers;

use \MyProject\View\View;
use \MyProject\Services\Db;

class MainController
{
    /** @var View */
    private $view;

    /** @var Db */
    private $db;

    public function __construct()
    {
        $this->view = new View(__DIR__ . "/../../../templates");
        $this->db = new Db();
    }

    public function main(): void
    {
        /*
        $articles = [
            ['name' => 'Статья 1', 'text' => 'Текст статьи 1'],
            ['name' => 'Статья 2', 'text' => 'Текст статьи 2'],
        ];
        */
        
        $articles = $this->db->query('SELECT * FROM `articles`;');
        var_dump($articles);

        //$this->view->renderHtml('main/main.php', ['articles' => $articles]);
    }

    public function sayHello(string $name): void
    {

        $this->view->renderHtml('main/hello.php', ['name' => $name, 'title' => 'Страница преветсвия']);
    }

    public function sayBye(string $name): void
    {
        echo "Пока, ". $name;
    }
}
