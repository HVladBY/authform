<?php
//print_r($_POST);
$regLogin = $_POST["login"];
$regPass = $_POST["password"];
if ($regLogin === strtolower($regLogin) && (strlen($regPass) >= 7 && (strlen($regPass) == strspn($regPass, "1234567890")))) {
        $newUser = implode("|", $_POST);
        file_put_contents("users.txt","{$newUser}\n" , FILE_APPEND);
        echo "Поздравляю! Вы успешно зарегистрировались";
} else {
    echo "Логин/пароль не подходит по условиям";
}