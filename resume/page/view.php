<?php
ini_set('display_errors',1);
function readJson($file) {
    $f = fopen($file, 'r');

    $json = fgets($f);

    $array = json_decode($json, true);

    return $array;
}

$users = readJson('users.txt');

?>

<html>
<head>
    <title>Резюме</title>
    <style>
        .wrapper {
            width: 740px;
            margin: 0 auto;
        }
        h1 {
            text-align: center;
        }
        .block {
            border-top: 1px solid #333333;
            padding: 20px 0;
            display: flex;
            justify-content: space-between;
        }

        .avatar {
            text-align: right;
            max-height: 60px;
        }
        img {
            max-height: 250px;
        }
    </style>
</head>
<body>
<br>
<h1>Резюме</h1>
<div class="wrapper">
    <div class="header">

        <h2>
            <?php
            echo $users['user_name'];
            ?>
        </h2>
        <h4>
            <?php
            echo $users['user_profession'];
            ?>
        </h4>
    </div>
    <div class="block">
        <div class="float-left">
            <p>
                <?php
                echo "Телефон для связи: " . $users['tel'];
                ?>
            </p>
            <p>Эл. почта: <a href=<?php echo $users['mail']; ?>>mailto: <?php echo $users['mail']; ?></a></p>
            <p>
                <?php
                echo "Зарплатные ожидания: " . $users['zarplata'] . "грн.";
                ?>
            </p>
            <p>
                <?php
                echo "Дата рождения: " . $users['date'];
                ?>
            </p>
            <p>
                <?php
                echo "Опыт работы (лет): " . $users['stazh'];
                ?>
            </p>
            <p>
                <?php
                echo "Город проживания: " . $users['city'];
                ?>
            </p>
            <p>
                <?php
                echo "Готов к переезду: " . $users['pereezd'];
                ?>
            </p>
        </div>
        <div class="avatar float-left">
            <img src=<?php echo '"' . $users['photo'] . '"'; ?>>
        </div>
    </div>
</div>
</body>
</html>

<?php
//echo '<pre>';
//print_r($users);
//echo '</pre>';