<?php /** @noinspection PhpMissingFieldTypeInspection */

namespace classes;
require_once("Database.php");
class User
{
    private $id;
    private $name;
    private $email;
    private $login;
    private $password;
    public static function getID() {
        return self :: $id;
    }

    public function addUser(): void
    {
        $data = [];
        $data["id"] = $this->id;
        $data["name"] = $this->name;
        $data["email"] = $this->email;
        $data["login"] = $this->login;
        $data["password"] = self::passwordSecure($this->password);
        //Database::openConnection();
        //var_dump($this);
        Database::putToDB($data);
    }
    public static function trimData($data) {
        foreach ($data as $key => $value) {
            if ($key == 'name') {
                $data[$key] = mb_convert_case(trim($value), MB_CASE_TITLE, "UTF-8");
            } elseif ($key == 'email') {
                $data[$key] = strtolower(trim($value));
            } else {
                $data[$key] = trim($value);
            }
        }
        return $data;
    }
    public static function setId(): int|string
    {
        if (filesize(Database::getFileURL()) === 0) {
            return 1;
        } else {
            $fileArray = file(Database::getFileURL(), FILE_IGNORE_NEW_LINES);
            $lastIdArrayJson = $fileArray[count($fileArray) - 1];
            $lastIdArray = json_decode($lastIdArrayJson, true);
            return $lastIdArray['ID'] + 1;
            }
    }
    public static function passwordSecure($password): string
    {
    return password_hash($password, PASSWORD_DEFAULT);
    }

    public function __construct($login, $password, $name, $email)
    {
        $this->id = self::setId();
        $this->name = $name;
        $this->password = $password;
        $this->login = $login;
        $this->email = $email;


    }
    public static function emptyName($name): bool
    {
        return trim($name) === '';
    }
    public static function userDataValidate($login, $email): bool|string
    {
        $dataBase = file(Database::getFileURL(), FILE_IGNORE_NEW_LINES);
       foreach ($dataBase as $value) {
           $userData = json_decode($value, true);
           if ($userData['login'] === $login) {
               return "Такой логин уже существует";
           } elseif ($userData['e-mail'] === $email) {
               return "Такой e-mail уже существует";
           }
       }
       return false;
    }
    public function getName() {
        return $this->name;
    }
    /// - достать пользователя по id
    /// - удалить пользователя по id
    /// - изменить пользователя по id
}