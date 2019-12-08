<?php
ini_set('display_errors',1);
/*
Написать фунцию, которая принимает массив. Значения элементов массива могут повторяться.
Например, $array = [1, 34, 22, 12, 6, 22, 45, 14, 34, 34, 10]
Функция должна возвращать количество уникальных элементов
*/


$array = [1, 34, 22, 12, 6, 22, 45, 14, 34, 34, 10];

function unique($mas){

    $result=array_unique($mas);

    $counter = count($result);

    return $counter;

}

echo unique($array);

?>
