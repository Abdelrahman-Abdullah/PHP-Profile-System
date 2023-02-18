<?php

final class Connection
{
    const LOCALHOST  = "mysql:host=localhost";
    const DBNAME  = "ooplogninsystem";
    const USERNAME  = "root";
    const PASSWORD  = "";
    const OPTIONS  = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ];


    public static function Connect()
    {

        try {
            return new PDO(
                self::LOCALHOST.";dbname=".self::DBNAME ,
                self::USERNAME,
                self::PASSWORD,
                self::OPTIONS
            );

        } catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }
}

Connection::Connect();