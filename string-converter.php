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


$str="hello world HAppY!";
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
            $stroka=strtolower($stroka);
            $stroka=ucfirst($stroka);
            echo $stroka;
            break;
        case 4:
            $stroka=strtolower($stroka);
            $stroka=ucwords($stroka);
            echo $stroka;
            break;
        case 5:
            $str="";
            $str1="";
//            $stroka_new=[];
            $stroka=str_split($stroka);
            for ($i=0;$i<count($stroka);$i++){
                if (ctype_upper ($stroka[$i])==true){
//                    $stroka_new[$i]=strtolower($stroka[$i]);
                    $str1=strtolower($stroka[$i]);
                    $str=$str . $str1;
                }else{
//                    $stroka_new[$i]=strtoupper($stroka[$i]);
                    $str1=strtoupper($stroka[$i]);
                    $str=$str . $str1;
                }
            }
//            $stroka_new = implode("", $stroka_new);

//            echo $stroka_new;
            echo $str;
            break;
    }

}



echo "Перечень режимов: <br>" . "1-все символы в верхнем регистре <br>" . "2-все символы в нижнем регистре <br>" .
    "3-первый символ строки в верхнем регистре, все остальные в нижнем регистре <br>" .
    "4-первые символы каждого слова в верхнем регистре, все остальные в нижнем регистре <br>" .
    "5-инвертированый регистр всех символов <br> <br>";

str_Converter($str, $pezhum);

?>