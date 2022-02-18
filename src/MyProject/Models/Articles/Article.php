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

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getText()
    {
        return $this->text;
    }

    public function __set($name, $value)
    {
        $camelCasename = $this->underscoreToCamelCase($name);
        $this->$camelCasename = $value;
    }

    private function underscoreToCamelCase(string $source)
    {
        return lcfirst(str_replace('_', '', ucwords($source, '_')));
    }
}
