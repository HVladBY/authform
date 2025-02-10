<?php

namespace classes;
require_once("User.php");

class Database
{
    private static string $fileURL = "database.json";

    ///прочитать про синглтон и реализовать логику:
    /// - подключения к бд
    public static function getFileURL(): string
    {
        return self::$fileURL;
    }
    public static function openConnectionPutToDB()
    {
        return fopen(static::getFileURL(), "a");
    }
    public static function writeToDB($data): void
    {
        fwrite(self::openConnectionPutToDB(), $data);
    }
    public static function closeConnectionPutToDB(): void
    {
        fclose(self::openConnectionPutToDB());
    }
    public static function putToDB($data): void
    {
        $userData = ['ID'=>$data['id'],'name'=>$data['name'],'e-mail'=>$data['email'], 'login'=>$data['login'], 'password'=>$data['password']];
        $string = json_encode($userData, JSON_UNESCAPED_UNICODE);
        self::openConnectionPutToDB();
        self::writeToDB("$string\n");
        self::closeConnectionPutToDB();
    }
    protected function __construct() { }
    protected function __clone() { }
}