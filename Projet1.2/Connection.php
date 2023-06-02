<?php

//////////////////////////////////////////////
///**********NE PAS MODIFIER***************///
//////////////////////////////////////////////

define('HOST', 'localhost');
define('DB_NAME', 'bddagora');
define('USER', 'root');
define('PASS', '');

class Connection {

    public static $db;

    /**
     * Init the database connection
     */
    public static function initConnection() {
        try {
            self::$db = new PDO("mysql:host=" . HOST . ';dbname=' . DB_NAME, USER, PASS);

            self::$db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $error) {
            echo $error;
        }
    }
}