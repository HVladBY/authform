<?php
$data = file_get_contents('php://input');
$data = json_decode($data, true);
$login = $data['login'];
$password = $data['password'];
$usersArray = file("users.txt", FILE_IGNORE_NEW_LINES);

foreach ($usersArray as $value) {
    $user = explode("|", $value);
    //print_r($user);
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
echo  json_encode($text);

