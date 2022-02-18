<?php

namespace MyProject\Models\Articles;

use MyProject\Models\Users\User;

class Article
{
    /** @var int */
    private $id;

    /** @var string */
    private $name;

    /** @var string */
    private $text;

    /** @var int */
    private $authorId;

    /** @var string */
    private $createdAt;

    /** @return int $id */
    public function getId(): int
    {
        return $this->id;
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

    /**@property integer $name */
    public function __set(string $name, $value): void
    {
        $camelCasename = $this->underscoreToCamelCase($name);
        $this->$camelCasename = $value;
    }

    /** Преобразование подчеркивания перед словом в CamalCase */
    private function underscoreToCamelCase(string $source): string
    {
        return lcfirst(str_replace('_', '', ucwords($source, '_')));
    }
}
