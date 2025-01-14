<?php

namespace classes;
//дописать и заюзать валидации
class Validate
{
    public static function validateEmail($email) :bool
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL) != $email) return false;

        return trim($email) == $email;
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

