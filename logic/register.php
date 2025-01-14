<?php

use classes\User;
use classes\Validate;

require_once ('classes/Validate.php');
require_once ('classes/User.php');

$data = file_get_contents('php://input');
$data = json_decode($data, true);
$data["email"] = 'assd@mail.ru';
$regID = User::setId();
$regLogin = $data["login"];
$regPass = $data["password"];
$regEmail = $data["email"];
$regName = $data["name"];
if (Validate::validateLogin($regLogin) && Validate::validatePassword($regPass) && Validate::validateEmail($regEmail)) {
        /*$newUser = implode("|", $data);

        //сохранение пользователя
        file_put_contents("users.txt","{$newUser}\n" , FILE_APPEND);*/

$newUser = new User($regID, $regLogin, $regPass, $regName, $regEmail);
$newUser->addUser();

        $res = "Поздравляю! Вы успешно зарегистрировались";
} else {
    $res = "Логин/пароль/E-mail не подходит по условиям";
}

echo  json_encode($res);