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
    public function addUser() {
        Database::openConnection();
        $git
        Database::putToDB($data);
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
    }

    public function getName() {
        return $this->name;
    }
    /// - достать пользователя по id
    /// - удалить пользователя по id
    /// - изменить пользователя по id
}