<?php
require_once ('classes/Database.php');
use classes\Database;

$data = file_get_contents('php://input');
$data = json_decode($data, true);
$login = $data['login'];
$password = $data['password'];
$usersArray = file(Database::getFileURL(), FILE_IGNORE_NEW_LINES);
$text = '';
foreach ($usersArray as $value) {
    $user = json_decode($value, true);
    if ($user['login'] == $login && password_verify($password, $user['password'])) {
        $text = "Здравствуйте! Вы успешно вошли в систему";
        break;
    } elseif ($user['login'] == $login && !password_verify($password, $user['password'])) {
        $text = "Неверный пароль!";
        break;
    } else {
        $text = "Такого пользователя не существует! Пройдите регистрацию.";
    }
}
echo  json_encode($text, JSON_UNESCAPED_UNICODE);



