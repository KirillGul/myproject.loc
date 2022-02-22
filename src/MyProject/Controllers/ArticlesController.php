<?php

namespace MyProject\Controllers;

use MyProject\Models\Articles\Article;
use MyProject\View\View;

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
     * Создание объекта View и передача пути к папке с шаблонами
     */
    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../../../templates/');
    }

    /**
     * Действие для вывода одной статьи
     */
    public function view(int $id)
    {
        $article = Article::getById($id);
/*
        $reflector = new \ReflectionObject($article);
        $properties = $reflector->getProperties();
        var_dump($properties);

        $propertiesNames = [];
        foreach ($properties as $property) {
            $propertiesNames[] = $property->getName();
        }
        var_dump($propertiesNames);

        $methods = $reflector->getMethods();
        var_dump($methods);
        return;
*/
        if (empty($article)) {
            $this->view->renderHtml('errors/404.php', [], 404);
            return;
        }
        
        //$articleAuthor = User::getById($article->getAuthorId());
        //var_dump($result);
        
        $this->view->renderHtml('articles/view.php', [
            'article' => $article
        ]);

        //var_dump($article);
    }

    public function edit(int $id)
    {
        $article = Article::getById($id);

        if (empty($article)) {
            $this->view->renderHtml('errors/404.php', [], 404);
            return;
        }
             
        $this->view->renderHtml('articles/view.php', [
            'article' => $article
        ]);

        //var_dump($article);
    }
}
