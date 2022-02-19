<?php

namespace MyProject\Models\Articles;

use MyProject\Models\ActiveRecordEntity;
use MyProject\Models\Users\User;

class Article extends ActiveRecordEntity
{
    /** @var string */
    protected $name;

    /** @var string */
    protected $text;

    /** @var int */
    protected $authorId;

    /** @var string */
    protected $createdAt;

    /** @var string */
    protected $authorName;

    private function __construct()
    {
        $this->setAuthorName();
    }

    /** @return string $name */
    public function getName(): string
    {
        return $this->name;
    }

    /** @return string $text */
    public function getText(): string
    {
        return $this->text;
    }

    /** @return int $authorId */
    public function getAuthorId(): int
    {
        return $this->authorId;
    }

    /** @return string */
    public function getAuthorName(): string
    {
        return $this->authorName;
    }

    /** @return void */
    public function setAuthorName(): void
    {
        $this->authorName = User::getById($this->authorId)->getNickname();
    }

    /**Отсюда возвращается название таблицы для запроса */
    protected static function getTableName(): string
    {
        return 'articles';
    }
}
