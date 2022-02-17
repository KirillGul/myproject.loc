<?php

namespace MyProject\Controllers;

/**
 * Класс главной страницы сайта
 */
class MainController
{

    public function main()
    {
        echo 'Главная страница';
    }

    /**
     * Функция приветствия
     * 
     * @param string $name ИмяПользователя
     */
    public function sayHello(string $name): void
    {
        echo 'Привет, ' . $name;
    }
}
