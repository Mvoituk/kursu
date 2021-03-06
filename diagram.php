<?php
ini_set('display_errors',1);
/*
 * Написать приложение для отображения столбчатой диаграммы,
 *      по оси X - год, начиная с 2000 до 2019, по оси Y какие-то рандомные значения от 1 до 300
 *
 * Предлагается написать 3 функции:
 * 1. Функция randArray должна возращать массив, ключами которого будет год с 2000 до текущего, значениями - радномные числа
 *      Для формирования массива можно использовать цикл for или любой другой удобный
 *      По желанию можно модифицировать условие так, чтобы  начало отсчета было не с 2000, а тоже рандомно,
*       например, с 2000 до 2010, то есть если рандомное число 2006, то строим диаграмму от 2006 до текущего года
 *
 * 2. Функция randColor должна возвращать строку рандомного цвета rgb, например "rgb(122, 12, 208)"
 *
 * 3. Функция makeDiagram должна принимать массив, который будет получен из функции randArray, и строить по нему столбчатую диаграмму.
 *      Столбики раскрасить в рандомный цвет, который можно получить путем вызова функции randColor
 *
 * Пример результата работы приложения можно посмотреть на рисунке diagram.png
 */


function randColor() {
    $color="";

    $r=rand(0, 255);
    $g=rand(0, 255);
    $b=rand(0, 255);
    $color="rgb(" . $r . ", " . $g . ", " . $b . ")";
return $color;
}

function randArray() {

    $mas=[];
    $year=rand(2000, 2010);

    for ($year;$year<=2019;$year++){

        $znach=rand(1, 300);
        $mas[$year] = $znach;

    }
return $mas;


}

function makeDiagram($masiv) {

    echo "<div style='display: flex; align-items: baseline;'>";

    foreach ($masiv as $key => $value ) {

        echo "<div style='margin-right: 20px; background: " . randColor() . "; width: 50px; height: " . $value . "px;'> </div>";

    }
    echo "</div>";

}

?>

<html>
<head>
    <title>Diagram</title>
    <style>

    </style>
</head>
<body>
<div class="diagram">
    <?php
    // Вывод диаграммы
    makeDiagram(randArray());
    ?>
</div>
</body>
</html>