<?php
//print_r($_POST);
$data = file_get_contents('php://input');
$data = json_decode($data, true);

$regLogin = $data["login"];
$regPass = $data["password"];
if ($regLogin === strtolower($regLogin) && (strlen($regPass) >= 7 && (strlen($regPass) == strspn($regPass, "1234567890")))) {
        $newUser = implode("|", $_POST);
        file_put_contents("users.txt","{$newUser}\n" , FILE_APPEND);
        $res = "Поздравляю! Вы успешно зарегистрировались";
} else {
    $res = "Логин/пароль не подходит по условиям";
}

echo  json_encode($res);