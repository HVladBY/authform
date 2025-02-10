<?php

use classes\User;
use classes\Validate;

require_once ('classes/Validate.php');
require_once ('classes/User.php');

$data = file_get_contents('php://input');
$data = json_decode($data, true);
if (User::emptyName($data['name'])) {
    $res = "Введите имя";
    echo  json_encode($res, JSON_UNESCAPED_UNICODE);
    die();
}
$userData = User::trimData($data);
$regLogin = $userData["login"];
$regPass = $userData["password"];
$regEmail = $userData["email"];
$regName = $userData["name"];
    if (User::userDataValidate($regLogin,$regEmail) !== false) {
        $res = User::userDataValidate($regLogin,$regEmail);
        echo  json_encode($res, JSON_UNESCAPED_UNICODE);
        die();
    }
    if (Validate::validateLogin($regLogin) && Validate::validatePassword($regPass) && Validate::validateEmail($regEmail)) {
$newUser = new User($regLogin, $regPass, $regName, $regEmail);
$userData["password"] = User::passwordSecure($userData["password"]);
        $newUser->addUser();
        $res = "Поздравляю! Вы успешно зарегистрировались";
} else {
        $res = "Логин/пароль/E-mail не подходит по условиям";
        }
echo  json_encode($res, JSON_UNESCAPED_UNICODE);