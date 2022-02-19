<?php

namespace MyProject\Models;

use MyProject\Services\Db;

abstract class ActiveRecordEntity
{
    /** @var int */
    protected $id;

    /** @return int $id */
    public function getId(): int
    {
        return $this->id;
    }

    /**@property integer $name */
    public function __set(string $name, $value): void
    {
        $camelCasename = $this->underscoreToCamelCase($name);
        $this->$camelCasename = $value;
    }

    /*
    * Поиск всех статей в таблице. Рализация CRUD - Read
    * @return static[]
    */
    public static function findAll(): array
    {
        $db = Db::getInstances();
        return $db->query('SELECT * FROM `' . static::getTableName() . '`;', [], static::class);
    }

    /**
     * @param int $id
     * @return static|null
     */
    public static function getById(int $id): ?self
    {
        $db = Db::getInstances();
        $entities = $db->query('SELECT * FROM `' . static::getTableName() . '` WHERE `id` = :id;', ['id' => $id], static::class);
        //var_dump($entities);

        return $entities ? $entities[0] : null;       
    }

    /** Преобразование подчеркивания перед словом в CamalCase */
    protected function underscoreToCamelCase(string $source): string
    {
        return lcfirst(str_replace('_', '', ucwords($source, '_')));
    }

    /**Отсюда возвращается название таблицы для запроса */
    abstract protected static function getTableName(): string;
}
