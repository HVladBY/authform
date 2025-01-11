<?php
$login = $_POST['login'];
$password = $_POST['password'];
//print_r($_POST);
$usersArray = file("users.txt", FILE_IGNORE_NEW_LINES);

foreach ($usersArray as $value) {
    $user = explode("|", $value);
    print_r($user);

    if ($user[0] == $login && $user[1] == $password) {
        $userName = $user[2];
        $text = "Здравствуйте, {$userName}! Вы успешно вошли в систему";
        break;
    } elseif ($user[0] == $login && $user[1] != $password) {
        $text = "Неверный пароль!";
        break;
    } else {
        $text = "Такого пользователя не существует! Пройдите регистрацию.";
    }
}
echo "<script>alert(".$text.");</script>";

