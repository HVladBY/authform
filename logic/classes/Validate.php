<?php

namespace classes;
//дописать и заюзать валидации
class Validate
{

    public static function validateEmail($email) :bool
    {
        return filter_var(trim($email), FILTER_VALIDATE_EMAIL);
    }
    public static function validatePassword($password) :bool
    {
        if (!strlen($password) <= 7 && !ctype_digit($password)) return false;

        return trim($password) == $password;
    }
    public static function validateLogin($login): bool
    {
        if (!strlen(trim($login))) return false;

        return strtolower($login) == $login;
    }
}

