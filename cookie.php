<?php
/*
Сделать темную и светлую тему для своего сайта используя cookie
1. Добавить на страницах выбор темы (ссылки с GET параметрами).
2. При выборе темы (клике на ссылку) установить куку в браузере
3. Отображать страницу при последующих запросах с соответствующей темой
*/


if ($_GET['theme'] == 'dark'){
    setcookie('theme', 'dark');
    $day_night='dark';
} elseif ($_GET['theme'] == 'light') {
        setcookie('theme', 'light');
        $day_night = 'light';

} elseif (!empty($_COOKIE['theme'])) {
    $day_night=$_COOKIE['theme'];
}

?>

<!DOCTYPE html>

<html>
<head>
    <title>Конструкция if</title>
    <style>
        body.dark {
            background-color: #202020;
            color: #ffffff;
        }
        body.light {
            background-color: #ffffff;
            color: #202020;
        }
    </style>
</head>
<body class="<?php echo $day_night ?>">

<a href="cookie.php?theme=dark">dark</a>
<a href="cookie.php?theme=light">light</a>

<h1>Основы языка PHP</h1>
<p>

    PHP, расшифровывающийся как "PHP: Hypertext Preprocessor" - «PHP: Препроцессор Гипертекста»,
    является распространенным интерпретируемым языком общего назначения с открытым исходным кодом.
    PHP создавался специально для ведения web-разработок и код на нем может внедряться непосредственно в HTML-код.
    Синтаксис языка берет начало из C, Java и Perl, и является легким для изучения.
    Основной целью PHP является предоставление web-разработчикам возможности быстрого создания динамически генерируемых
    web-страниц, однако область применения PHP не ограничивается только этим.
</p>
</body>
</html>