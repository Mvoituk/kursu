<?php
ini_set('display_errors',1);
/*
Написать функцию, которая принимает первым параметром строку, содержащую список стран, разделенных запятыми.
Функция должна отсортировать страны в алфавитном порядке.
Вторым параметром функция принимает разделитель и возвращает строку, содержащую отсортированные страны с указанным разделителем
Второй параметр необязательный, и по умолчанию страны будут разделяться определенным на ваше усмотрение символом
*/

$str = "Ukraine,Poland,France,Hungary,Germany";
$razd= ":";

function sortuv($stroka, $razdelit='$'){

    $result = explode(",", $stroka);

    sort($result);

    $sort_Stroka = implode(" ", $result);

    $new_Stroka = str_replace(" ", $razdelit, $sort_Stroka);

    return $new_Stroka;

}

echo sortuv($str);

?>
