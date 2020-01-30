<?php // Для файлов на сервер необходим method=post и enctype=multipart/form-data ?>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="avatar">
        <button type="submit" name="upload">Отправить</button>
    </form>

<?php

if (!empty($_POST["upload"])) {
    print_r($_FILES);
}
