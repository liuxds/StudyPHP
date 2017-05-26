<?php

/*
 * 单例模式
 */

class Mysql {

    public static $conn;

    public static function getInstance() {
        if (!self::$conn) {
            new self();
            return self::$conn;
        } else {
            return self::$conn;
        }
    }

    private function __construct() {
        self::$conn = "mysql_connect:"; // mysql_connect('','','') 
    }

    public function __clone() {
        trigger_error("Only one connection");
    }

}

echo Mysql::getInstance();
echo "\n";
echo Mysql::getInstance();
