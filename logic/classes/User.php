<?php

namespace classes;

class User
{
    private $id, $name, $passwod, $login;
    public function __construct($login, $name, $passwod)
    {
        $this->name = $name;
    }
}
