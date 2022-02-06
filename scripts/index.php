<?php

/*
include_once "Post.php";
include_once "Lesson.php";
include_once "PaidLesson.php";

$paidLesson = new PaidLesson("Урок о наследовании в PHP", "Лол, кек, чебурек", "Ложитесь спать, утро вечера мудренее", 99.90);
var_dump($paidLesson);
*/

/*
include_once "iCalculateSquare.php";
include_once "Circle.php";
include_once "Square.php";
include_once "Rectangle.php";

$objects = [
    new Circle(2),
    new Square(2),
    new Rectangle(2, 3)
];

foreach ($objects as $object) {
    $getClass = get_class($object);
    if ($object instanceof iCalculateSquare) {
        echo 'Объект реализует интерфейс CalculateSquare. Площадь: ' . $object->calculateSquare() . ' , это объект класса ' . $getClass;
        echo '<br>';
    } else {
        echo 'Объект класса ' . $getClass . ' не реализует интерфейс CalculateSquare.';
    }
}
*/

include "HumanAbstract.php";
include "RussianHuman.php";
include "EnglishHuman.php";

$russianHuman = new RussianHuman('Иван');
echo $russianHuman->introduceYourself();
echo '<br>';

$englishHuman = new EnglishHuman('John');
echo $englishHuman->introduceYourself();
