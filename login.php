<?php

$users=[
        "Petrov" => "password",
        "Mihaylov" => "password1",
        "Vasya" => "password3",
];



?>

<html>
<head>
    <title></title>
</head>
<body>
<form method="post">
        <label>Имя пользователя</label>
        <br>
        <input name="user_login">
        <br>
        <label>Пароль</label>
        <br>
        <input type="password" name="user_password">
        <br>
        <br>
        <br>
        <input type="submit">
    </form>

<?php if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $inputlogin = $_POST['user_login'];
    $inputpassword = $_POST['user_password'];

    if (array_key_exists($inputlogin, $users) && $users[$inputlogin] === $inputpassword){
            echo  "Юзер залогинен";
            }else{
            echo  "Что-то пошло не так";
    }
}
?>
</body>
</html>