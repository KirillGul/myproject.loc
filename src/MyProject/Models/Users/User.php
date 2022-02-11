<?php

namespace MyProject\Models\Users;

use MyProject\Models\ActiveRecordEntity;

class User extends ActiveRecordEntity
{
    /** @var string */
    protected $nickname;

    /** @var string */
    protected $email;

    /** @var int */
    protected $isConfirmed;

    /** @var string */
    protected $role;

    /** @var string */
    protected $passwordHash;

    /** @var string */
    protected $authToken;

    /** @var string */
    protected $createdAt;

    /*public function __construct(string $name)
    {
        $this->name = $name;
    }*/

    public function getNickname(): string
    {
        return $this->nickname;
    }

    protected static function getTableName(): string 
    {
        return 'users';
    }
}
