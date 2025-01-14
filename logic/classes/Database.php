<?php

namespace classes;
require_once("User.php");

class Database
{
    private static $fuleURL = "database.json";

    ///прочитать про синглтон и реализовать логику:
    /// - подключения к бд
    /**
     * @var false|resource
     */
    private static $openFile;

    public static function openConnection()
    {
        static::$openFile = fopen(static::$fuleURL, "a+");
    }

    private function closeConnection()
    {
        fclose(static::$openFile);
    }

    public static function putToDB($data) {

        file_put_contents(Database::$fuleURL, json_encode($data, JSON_FORCE_OBJECT), FILE_APPEND);
    }


}