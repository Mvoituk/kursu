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

function validateFile(){
    if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_FILES["foto"])) {

    $whitelist = ['image/jpg', 'image/jpeg', 'image/gif', 'image/png'];

        if (in_array($_FILES['foto']['type'], $whitelist)) {

        return true;
    }
}
    return false;
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

function saveJson($file, $array)
{
    $json = json_encode($array, JSON_UNESCAPED_UNICODE);

    $f = fopen($file, 'w');

    fwrite($f, $json);

    fclose($f);
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
$Foto = $_FILES['foto'];

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

if (!validateFile()){
        $errors['foto'] = $Foto;
        echo 'Файл неправильного формата (допустимые форматы jpeg, gif, png)';
} else {
    $fileFrom = "/home/mison/Загрузки/" . $_FILES['foto']['name'];
    $fileName = $_SERVER['DOCUMENT_ROOT'] . "/git/resume/page/images/" . $_FILES['foto']['name'];
    if (copy($fileFrom, $fileName)) {
        echo "Файл " . $_FILES['foto']['name'] . " успешно загружен";
    } else {
        echo "файл не загружен";
    }
}

}

?>


<html>
<head>
    <title>Резюме</title>
    <style type='text/css'>
        .error{
            border: 7px solid red;
        }

    </style>
</head>
<body>
<br>
<?php if ($_SERVER['REQUEST_METHOD'] == 'GET' || !empty($errors)){ ?>
    <h1>Резюме</h1>
    <form method="post" action="" enctype="multipart/form-data">
        <label>ФИО</label>
        <br>
        <input type="text" name="user_name" value="<?php echo $Login ?>"
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
        <label>Фото</label>
        <br>
        <input type="file" name="foto" <?php if (array_key_exists('foto', $errors)) echo 'class="error"' ?>>
        <br>
        <br>
        <br>
        <button type="submit">Отправить</button>
    </form>
<?php } else {
    $resume = [
        'user_name' => $Login,
        'user_profession' => $Profession,
        'tel' => $Tel,
        'mail' => $Mail,
        'zarplata' => $Zarplata,
        'date' => $Date,
        'stazh' => $Stazh,
        'city' => $City,
        'pereezd' => $Pereezd,
        'photo' => $fileName
    ];
    saveJson('users.txt', $resume);
    echo "Резюме успешно сохранено";
}

?>
</body>
</html>