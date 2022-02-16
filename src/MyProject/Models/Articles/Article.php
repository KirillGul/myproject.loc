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

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): void
    {
        $this->text = $text;
    }

    /**
     * @return int
     */
    public function getAuthorId(): int
    {
        return (int) $this->authorId;
    }

    public function setAuthorId(int $authorId): void
    {
        $this->authorId = $authorId;
    }

    public function setCreatedAt(string $time): void
    {
        $this->createdAt = $time;
    }

    /**
    * @return User
    */
    public function getAuthor(): ?User
    {
        $authorResult = User::getById($this->authorId);
        
        return $authorResult ?? null;        
    }

    protected static function getTableName(): string 
    {
        return 'articles';
    }
}
