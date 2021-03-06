<?php
//ini_set('display_errors',1);
/*
Написать модуль добавления нового пользователя в систему.
1. Написать форму, которая будет отправляться методом POST и будет включать следующие поля:
    a. Имя пользователя (текстовое поле)
    b. Фамилия пользователя (текстовое поле)
    c. Область проживания (выпадающий список)
    d. Город проживания (текстовое поле)
    e. Адрес проживания (текстовая область)
    f. Дата рождения (поле типа date)
2. Для хранения корректных значений областей, создать индексированный массив, содержащий все области Украины.
        В элементе select выводить элементы option из этого массива.
        Значениями option должны быть ключи массива, а в тексте должны быть значения элементов.
        Например <option value="21">Хмельницька область</option>
2. Написать код, который будет принимать и обрабатывать POST запрос.
3. Все входные параметры должны быть отфильтрованы с помощью встроенных функций, или пользовательскими функциями.
        В каждом параметре должны быть удалены все пробельные символы (в начале и конце), теги и преобразованы специальные символы.
4. Все входные параметры должны быть провалидированы с применением следующих правил:
    a) Имя, фамилия и город должны состоять минимум из 2 и максимум из 32 символов.
    b) Фамилия пользователя может быть двойная, например, Салтыков-Щедрин
    с) Города могут состоять из 2 слов через пробел, например Кривой Рог, или через дефис, например Ивано-Франковск
    d) Дата рождения должна быть корректной датой. Год не должен быть меньше 1900 и больше текущего года
    e) Область должна быть целым числом и значения данного параметра должно быть ключом в вашем массиве с областями.
5. Если какой-то из входящих параметров не проходит валидацию, нужно вывести соответствующее сообщение пользователю.
        В этом случае нужно снова вывести форму, с заполненными в прошлый раз данными (чтобы пользователь не вводил все данные заново).
        Также нужно выделить, например красными рамками элементы формы, которые не прошли валидацию.
6. Если все данные прошли валидацию нужно спрятать форму и вывести сообщение типа:
    "Пользователь {ИМЯ} {ФАМИЛИЯ}, {ДАТА}г. рождения, проживающий по адресу: {ОБЛАСТЬ}, г. {ГОРОД}, {АДРЕС}, был успешно добавлен в систему"
    Например, "Иванов Сергей, 22.10.1988г. рождения, проживающий по адресу: Житомирская область, г. Бердычев, ул. Пушкина, д. 21, был успешно добавлен в систему"
*/
$oblast=[
    0=>"Виберіть область",
    1=>"Вінницька область",
    2=>"Волинська область",
    3=>"Дніпропетровська область",
    4=>"Донецька область",
    5=>"Житомирська область",
    6=>"Закарпатська область",
    7=>"Запорізька область",
    8=>"Івано-Франківська область",
    9=>"Київська область",
    10=>"Кіровоградська область",
    11=>"Луганська область",
    12=>"Львівська область",
    13=>"Миколаївська область",
    14=>"Одеська область",
    15=>"Полтавська область",
    16=>"Рівненська область",
    17=>"Сумська область",
    18=>"Тернопільська область",
    19=>"Харківська область",
    20=>"Херсонська область",
    21=>"Хмельницька область",
    22=>"Черкаська область",
    23=>"Чернівецька область",
    24=>"Чернігівська область"
];


function filterInput($var){

    return htmlspecialchars(strip_tags(trim($var)));
}

function validateString($var, $min = 2, $max = 64){

    if (empty($var) || strlen($var) < $min || strlen($var) > $max) {
        return false;
    }
    return true;
}

function validateRegion($region){
    global $oblast;

    if (empty(intval($region)) || !array_key_exists($region, $oblast) || $region == 0){
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
    $inputLastname = $_POST['user_lastname'];
    $inputRegion = $_POST['region'];
    $inputCity = $_POST['city'];
    $inputAdress = $_POST['adress'];
    $inputDate = $_POST['date'];



    $Login = filterInput($inputLogin);
    $Lastname = filterInput($inputLastname);
    $Region = filterInput($inputRegion);
    $City = filterInput($inputCity);
    $Adress = filterInput($inputAdress);
    $Date = filterInput($inputDate);

    $errors = [];

    if (!validateString($Login)){
        $errors['login'] = $Login;
        echo 'Поле "Имя пользователя" не должно быть пустым, меньше 2 и больше 32 символов'.'<br>';
    }

    if (!validateString($Lastname)){
        $errors['last_name'] = $Lastname;
        echo 'Поле "Фамилия пользователя" не должно быть пустым, меньше 2 и больше 32 символов'.'<br>';
    }

    if (!validateString($City)){
        $errors['city'] = $City;
        echo 'Поле "Город проживания" не должно быть пустым, меньше 2 и больше 32 символов'.'<br>';
    }

    if (!validateString($Adress)){
        $errors['adress'] = $Adress;
        echo 'Поле "Адрес проживания" не должно быть пустым, меньше 2 и больше 32 символов'.'<br>';
    }

    if (!validateDate($Date)){
        $errors['date'] = $Date;
        echo 'Дата рождения должна быть корректной датой';
    }

    if (!validateRegion($Region)){
        $errors['region'] = $Region;
        echo 'Значение области должно быть корректным';
    }
//var_dump($_POST);
//    if (!empty($errors)){
//        var_dump($errors);
//    }
}

?>


<html>
<head>
    <title>Задача add-user</title>
    <style type='text/css'>
        .error{
            border: 7px solid red;
        }
    </style>
</head>
<body>
<?php if ($_SERVER['REQUEST_METHOD'] == 'GET' || !empty($errors)){ ?>
    <form method="post" action="">
        <label>Имя пользователя</label>
        <br>
        <input type="text" name="user_name" value="<?php echo $Login ?>" <?php if (array_key_exists('login', $errors)) echo 'class="error"' ?>>
        <br>
        <br>
        <label>Фамилия пользователя</label>
        <br>
        <input type="text" name="user_lastname" value="<?php echo $Lastname ?>" <?php if (array_key_exists('last_name', $errors)) echo 'class="error"' ?>>
        <br>
        <br>
        <label>Область проживания</label>
        <br>
        <select name="region" <?php if (array_key_exists('region', $errors)) echo 'class="error"' ?>>
            <?php foreach ($oblast as $key=>$value){?>
                <option value="<?php echo $key;?>"><?php echo $value;?></option>
            <?php } ?>
        </select>
        <br>
        <br>
        <label>Город проживания</label>
        <br>
        <input type="text" name="city" value="<?php echo $City ?>" <?php if (array_key_exists('city', $errors)) echo 'class="error"' ?>>
        <br>
        <br>
        <label>Адрес проживания</label>
        <br>
        <textarea style="height: 100px; width: 180px" name="adress" <?php if (array_key_exists('adress', $errors)) echo 'class="error"' ?>><?= $Adress ?></textarea>
        <br>
        <br>
        <label>Дата рождения</label>
        <br>
        <input type="date" name="date" value="<?php echo $Date ?>" <?php if (array_key_exists('date', $errors)) echo 'class="error"' ?>>
        <br>
        <br>
        <br>
        <button type="submit">Отправить</button>

    </form>
<?php } else { ?>
    <h4>Пользователь <?= $Login ?> <?= $Lastname ?>, <?= date('d.m.Y', strtotime($Date)) ?>г. рождения, проживающий по адресу: <?= $oblast[$Region] ?>, г. <?= $City ?>, <?= $Adress ?>, был успешно добавлен в систему</h4>
<?php } ?>
</body>
</html>