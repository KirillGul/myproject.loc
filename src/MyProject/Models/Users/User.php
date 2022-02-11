<?php

namespace MyProject\Models\Users;

class User
{
    /** @var int */
    private $id;

    /** @var string */
    private $nickname;

    /** @var string */
    private $email;

    /** @var int */
    private $isConfirmed;

    /** @var string */
    private $role;

    /** @var string */
    private $passwordHash;

    /** @var string */
    private $authToken;

    /** @var string */
    private $createdAt;

    /*public function __construct(string $name)
    {
        $this->name = $name;
    }*/

    public function __set($name, $value): void
    {
        $camelCaseName = $this->underscoreToCamelCase($name);
        $this->$camelCaseName = $value;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getNickname(): string
    {
        return $this->nickname;
    }

    private function underscoreToCamelCase(string $name): string
    {
        return lcfirst(str_replace('_', '', ucwords($name, '_')));
    }
}
