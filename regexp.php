<?php
ini_set('display_errors',1);
/*
Имеется массив, содержащий список урлов различных сайтов.
Необходимо написать функцию, которая будет определять урлы, которые находятся в одной доменной зоне.
То есть, нужно получить все урлы с одинаковым доменом верхнего уровня, например все урлы в доменной зоне ua.

Функция на входе должна принимать два параметра:
1) массив урлов
2) строку с доменном верхнего уровня, например 'ua'.

На выходе должна отдавать массив, содержащий только элементы, которые находятся в указанной доменной зоне
*/

$array = [
    'https://itea.ua',
    'https://wikipedia.org',
    'https://taobao.com',
    'https://rozetka.com.ua',
    'https://www.google.com',
    'https://www.amazon.com',
    'https://www.php.net',
    'https://allegro.pl',
    'https://telegram.org',
    'https://www.ebay.com',
    'https://www.mobile.de',
    'https://prom.ua',
    'https://aliexpress.com',
    'https://www.ukr.net',
];

function filtr($mas, $str){

$pattern = '/^.*\.' . $str .'/';

$arr = [];
$i=0;

    foreach ($mas as $item){
        if (preg_match($pattern, $item) == 1){

            $arr[$i]=$item;
            $i++;

        }
    }

    return $arr;
}
$result = filtr($array, 'ua');
echo '<pre>';
print_r($result);
echo '</pre>';
?>