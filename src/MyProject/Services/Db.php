<?php

namespace MyProject\Services;

/**
 * Класс для работы с базой данных
 */
class Db
{
    /**
     *  @var \PDO Объект класса PDO
     */
    private $pdo;

    /**
     * Создаёт объет класса PDO и подключение к базе данных
     */
    private function __construct()
    {
        $dbOptions = (require __DIR__ . '/../../settings.php')['db'];

        $this->pdo = new \PDO(
            'mysql:host=' . $dbOptions['host'] . ';dbname=' . $dbOptions['dbname'],
            $dbOptions['user'],
            $dbOptions['password']
        );
        $this->pdo->exec('SET NAMES UTF8');
    }

    /**
     * Обработка запроса к БД
     * @param string $sql Строка запроса
     * @param array $params Подготовленные параметры для запроса $sql
     * @param string $className Какой класс будет создан для каждого полученной строки запросы из БД (по умол.stdClass)
     */
    public function query(string $sql, $params = [], string $className = 'stdClass'): ?array
    {
        $sth = $this->pdo->prepare($sql);
        $result = $sth->execute($params);

        if ($result === false) {
            return null;
        }

        return $sth->fetchAll(\PDO::FETCH_CLASS, $className); //возвращается массив объектов указанного класса
    }
}
