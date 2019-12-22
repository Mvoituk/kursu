<?php
function filterInput($var){

return htmlspecialchars(strip_tags(trim($var)));
}

function validateString($var, $min = 2, $max = 64){

if (empty($var) || strlen($var) < $min || strlen($var) > $max) {
return false;
}
return true;
}

function validateDate($date){
$todey = time();
$timestamp = strtotime($date);
$year = date('Y', $timestamp);
if ($year<1900 || $timestamp>$todey){
return false;
}
return true;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

$inputLogin = $_POST['user_name'];
$inputProfession = $_POST['user_profession'];
$inputTel = $_POST['tel'];
$inputMail = $_POST['mail'];
$inputZarplata = $_POST['zarplata'];
$inputDate = $_POST['date'];
$inputStazh = $_POST['stazh'];
$inputCity = $_POST['city'];
$inputPereezd = $_POST['pereezd'];



$Login = filterInput($inputLogin);
$Profession = filterInput($inputProfession);
$Tel = filterInput($inputTel);
$Mail = filterInput($inputMail);
$Zarplata = filterInput($inputZarplata);
$Date = filterInput($inputDate);
$Stazh = filterInput($inputStazh);
$City = filterInput($inputCity);
$Pereezd = filterInput($inputPereezd);

$errors = [];

if (!validateString($Login)){
$errors['login'] = $Login;
echo 'Поле "Имя пользователя" не должно быть пустым, меньше 2 и больше 32 символов'.'<br>';
}

if (!validateString($Profession)){
$errors['user_profession'] = $Profession;
echo 'Поле "Профессия" не должно быть пустым, меньше 2 и больше 32 символов'.'<br>';
}

if (!validateString($Tel)){
$errors['tel'] = $Tel;
echo 'Поле "Телефон для связи" не должно быть пустым, меньше 2 и больше 32 символов'.'<br>';
}

if (!validateString($Mail)){
$errors['mail'] = $Mail;
echo 'Поле "Эл. почта" не должно быть пустым, меньше 2 и больше 32 символов'.'<br>';
}

if (!validateString($Zarplata)){
    $errors['zarplata'] = $Zarplata;
    echo 'Поле "Зарплатные ожидания" не должно быть пустым, меньше 2 и больше 32 символов'.'<br>';
}

if (!validateString($City)){
$errors['city'] = $City;
echo 'Поле "Город проживания" не должно быть пустым, меньше 2 и больше 32 символов'.'<br>';
}

if (!validateString($Pereezd)){
$errors['pereezd'] = $Pereezd;
echo 'Поле "Готов к переезду" не должно быть пустым, меньше 2 и больше 32 символов'.'<br>';
}

if (!validateDate($Date)){
$errors['date'] = $Date;
echo 'Дата рождения должна быть корректной датой';
}
//var_dump($_POST);
//    if (!empty($errors)){
//        var_dump($errors);
//    }
}

?>


<html>
<head>
    <title>Resume</title>
    <style type='text/css'>
        .error{
            border: 7px solid red;
        }

    </style>
<body>

<br>
<h1>Резюме</h1>
<?php if ($_SERVER['REQUEST_METHOD'] == 'GET' || !empty($errors)){ ?>
    <form method="post" action="">
        <label>ФИО</label>
        <br>
        <input type="text" <?php if ($_GET['rezhum'] == 'view') echo 'readonly'?> name="user_name" value="<?php echo $Login ?>"
            <?php if (array_key_exists('login', $errors)) echo 'class="error"' ?>>
        <br>
        <br>
        <label>Профессия</label>
        <br>
        <input type="text" name="user_profession" value="<?php echo $Profession ?>" <?php if (array_key_exists('user_profession', $errors)) echo 'class="error"' ?>>
        <br>
        <br>
        <label>Телефон для связи</label>
        <br>
        <input type="text" name="tel" value="<?php echo $Tel ?>" <?php if (array_key_exists('tel', $errors)) echo 'class="error"' ?>>
        <br>
        <br>
        <label>Эл. почта</label>
        <br>
        <input type="text" name="mail" value="<?php echo $Mail ?>" <?php if (array_key_exists('mail', $errors)) echo 'class="error"' ?>>
        <br>
        <br>
        <label>Зарплатные ожидания</label>
        <br>
        <input type="text" name="zarplata" value="<?php echo $Zarplata ?>" <?php if (array_key_exists('zarplata', $errors)) echo 'class="error"' ?>>
        <br>
        <br>
        <label>Дата рождения</label>
        <br>
        <input type="date" name="date" value="<?php echo $Date ?>" <?php if (array_key_exists('date', $errors)) echo 'class="error"' ?>>
        <br>
        <br>
        <label>Опыт работы</label>
        <br>
        <input type="text" name="stazh" value="<?php echo $Stazh ?>" <?php if (array_key_exists('stazh', $errors)) echo 'class="error"' ?>>
        <br>
        <br>
        <label>Город проживания</label>
        <br>
        <input type="text" name="city" value="<?php echo $City ?>" <?php if (array_key_exists('city', $errors)) echo 'class="error"' ?>>
        <br>
        <br>
        <label>Готов к переезду</label>
        <br>
        <input type="text" name="pereezd" value="<?php echo $Pereezd ?>" <?php if (array_key_exists('pereezd', $errors)) echo 'class="error"' ?>>
        <br>
        <br>
        <br>
        <button type="submit">Отправить</button>


    </form>
<?php } else { ?>
    <h4>Пользователь <?= $Login ?> <?= $Profession ?>, <?= date('d.m.Y', strtotime($Date)) ?>г. рождения, проживающий по адресу: г. <?= $City ?>, был успешно добавлен в резюме</h4>
<?php } ?>
</body>
</html>