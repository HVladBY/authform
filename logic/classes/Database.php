<?php
namespace classes;
require_once("User.php");
class Database
{
    private $fuleURL = "database.json";
    ///прочитать про синглтон и реализовать логику:
    /// - подключения к бд
    private function openConnection ()
{
    $openFile = fopen($this->fuleURL, "a+");
}
    private function closeConnection () {
        fclose($openFile);
    }

    /// - сохранения пользователя (USER)
    public static function saveUser($user) {
    $string = json_encode($user, JSON_UNESCAPED_UNICODE);
    file_put_contents("database.json","{$string}\n" , FILE_APPEND);
    }
    /// - достать пользователя по id
    /// - удалить пользователя по id
    /// - изменить пользователя по id

}