<?php

class Database {
    const HOST = 'mysql:host=localhost;dbname=shop';
    const USERNAME='root';
    const PASSWORD='';
    static $connection = null;
    public static function connect()
    {
        if (!self::$connection) {
            try {
                self::$connection = new PDO(
                    self::HOST,
                    self::USERNAME,
                    self::PASSWORD
                );
            } catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
        return self::$connection;
    }
}
