<?php
namespace classes;
require_once("Database.php");
class User
{
    private $id;
    private $name;
    private $password;
    private $login;
    private $email;
    public function toDatabase($ID, $login, $password, $name, $email) {
        $x = array(
            "id" => $ID,
            "login" => $login,
            "password" => password_hash($password, PASSWORD_DEFAULT),
            "name" => $name,
            "email" => $email
        );
        Database::saveUser($x);
    }
    public static function setId() {
        $filename = "id.txt";
        $open = fopen($filename, 'a+');
        $read = fread($open, filesize($filename));
        settype($read, "integer");
        $ID = $read + 1;
        settype($ID, "string");
        fclose($open);
        file_put_contents($filename, $ID);
        return $ID;
    }

    public function __construct($ID, $login, $password, $name, $email)
    {
        $this->name = $name;
        $this->password = $password;
        $this->login = $login;
        $this->email = $email;
        $this->id = $ID;
        $this->toDatabase($ID,$login, $password, $name, $email);
    }
}