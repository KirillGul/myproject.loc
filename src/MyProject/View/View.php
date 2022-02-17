<?php

namespace MyProject\View;

class View
{
    /**
     * Путь к папке с шаблонами
     */
    private string $templatesPath;

    public function __construct(string $templatesPath)
    {
        $this->templatesPath = $templatesPath;
    }

    /**
     * Отрисовка шаблона ($templateName) и данных ($vars) на экране
     * 
     * @param string $templateName Имя шаблона
     * @param array $vars Массив переменных для шаблона
     * @param int $code Код ответа сервера
     */
    public function renderHtml(string $templateName, array $vars = [], int $code = 200): void
    {
        extract($vars); //преобразует массив в переменные

        ob_start();
        include $this->templatesPath . '/' . $templateName;
        $buffer = ob_get_contents();
        ob_end_clean();

        http_response_code($code); //передаём код ответа
        echo $buffer; //выводим на экран
    }
}
