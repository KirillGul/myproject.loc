<?php

namespace MyProject\Controllers;

use \MyProject\Models\Articles\Article;
use \MyProject\View\View;

class ArticlesController
{
    /** @var View */
    private $view;

    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../../../templates');
    }

    public function view(int $articleId): void
    {
        $article = Article::getById($articleId);
       
        if ($article === null) {
            $this->view->renderHtml('errors/404.php', [], '404');
            return;
        }

        $this->view->renderHtml('articles/view.php', ['article' => $article]);
    }

    public function edit(int $articleId): void
    {
        /** @var Article $article */
        $article = Article::getById($articleId);
        
        if ($article === null) {
            $article = new Article;

            $article->setAuthorId(1);
            $article->setCreatedAt(date('Y-m-d H:i:s', time()));
        }

        $article->setName('Новое название статьи');
        $article->setText('Новый текст статьи');

        $article->save($articleId);
    }
}
