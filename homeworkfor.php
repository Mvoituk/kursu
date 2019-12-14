<?php
/*
С помощью двух циклов for (один вложен в другой) написать алгоритм вывода на экран таблицы умножения
Оформить можно с помощью html элементов table или через кастомный css

Дополнительно. Выделить первый ряд и первую колонку дополнительным цветом

*/
$dob=0;
?>

<!DOCTYPE html>

<html>
<head>
    <title>Основы языка PHP</title>
    <style>
        th {
            background: yellow; /* Цвет фона строки заголовка */
        }
    </style>
</head>
<body>
<h1>Цикл for</h1>
<table border="1" width="300">
    <caption><h1>Таблиця множення</h1></caption>
        <tr>
            <th> Число 1 </th>
            <th> Число 2 </th>
            <th> Добуток </th>
        </tr>

    <?php
    // Решение
    for ($i=1;$i<=9;$i++){
        for ($j=1;$j<=9;$j++){
            $dob=$i*$j;
    ?>
        <tr>
            <td bgcolor="yellow"> <?php echo $i ?> </td>
            <td> <?php echo $j ?> </td>
            <td> <?php echo $dob ?> </td>
        </tr>
    <?php
        }
    }
    ?>
</table>
</body>
</html>