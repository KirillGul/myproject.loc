<?php

namespace MyProject\Controllers;

use MyProject\View\View;
use MyProject\Services\Db;

/**
 * Класс главной страницы сайта
 */
class ArticlesController
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
     * Действие для вывода одной статьи
     */
    public function view(int $id)
    {
        $result = $this->db->query(
            'SELECT * FROM `articles` WHERE `id` = :id;',
            ['id' => $id]
        );

        if (empty($result)) {
            $this->view->renderHtml('errors/404.php', [], 404);
            return;
        }

        $authorId = $result[0]['author_id'];
        $userNickname = $this->db->query(
            'SELECT nickname FROM `users` WHERE `id` = :id;',
            ['id' => $authorId]
        );
        //var_dump($userNickname);

        $this->view->renderHtml('articles/view.php', [
            'article' => $result[0], 'nickname' => $userNickname[0]
        ]);
    }
}
