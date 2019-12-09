<?php
ini_set('display_errors',1);
/*
Написать функцию-конвертер строки.
На входе принимается строка, и режим преобразования.
В зависимости от режима, фукнция будет преобразовывать и возвращать строку:
    1) все символы в верхнем регистре
    2) все символы в нижнем регистре
    3) первый символ строки в верхнем регистре, все остальные в нижнем регистре
    4) первые символы каждого слова в верхнем регистре, все остальные в нижнем регистре
    5) инвертированый регистр всех символов
*/


$str="hello world Happy!";
$pezhum=rand(1, 5);

function str_Converter($stroka, $rezhum){
    echo "Режим преобразования на входе: " . $rezhum . "<br>" .
         "Строка на входе: " . $stroka . "<br> <br>" . "Результирующая строка: ";

    switch ($rezhum){
        case 1:
            echo strtoupper($stroka);
            break;
        case 2:
            echo strtolower($stroka);
            break;
        case 3:
//            $array=explode(" ", $stroka);
//            strtoupper($array[0]);
//            for ($i=1; $i<count($array); $i++){
//                strtolower($array[$i]);
//            }
//            $sort_Stroka = implode(" ", $array);
//            echo $sort_Stroka;
            echo ucfirst($stroka);
            break;
        case 4:
            echo ucwords($stroka);
            break;
        case 5:
            $stroka = mb_convert_case($stroka, MB_CASE_FOLD_SIMPLE, "UTF-8");
            echo $stroka;
            break;
    }

}



echo "Перечень режимов: <br>" . "1-все символы в верхнем регистре <br>" . "2-все символы в нижнем регистре <br>" .
    "3-первый символ строки в верхнем регистре, все остальные в нижнем регистре <br>" .
    "4-первые символы каждого слова в верхнем регистре, все остальные в нижнем регистре <br>" .
    "5-инвертированый регистр всех символов <br> <br>";

str_Converter($str, $pezhum);

?>