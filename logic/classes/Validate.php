<?php

namespace classes;
//дописать и заюзать валидации
class Validate
{
    public static function validateEmail($email)
    {

    }
    public static function validatePassword($password) {

    }
    public static function validateLogin($login): bool
    {
        if (!strlen(trim($login))) return false;

        return strtolower($login) == $login;
    }
}

