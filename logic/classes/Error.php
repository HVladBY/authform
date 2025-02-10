<?php

namespace classes;

class Error
{
    public const LOGIN_ERROR = "Ошибка в логине";
    public const PAS_ERROR = "Ошибка в пароле";

    public static function showError($msg):string
    {
        if (!strlen(trim($msg))) return "Нет сообщения об ошибке";
        return $msg;
    }

}