<?php

namespace MyClasses;
defined('_CONTROL') or die;

class MyDb
{
    const DB_SERVER = 'mysql';
    const HOST = 'localhost';
    const USER = 'root';
    const PASSWORD = '';
    const DB_NAME = 'ikantam';
    protected static $_instance;

    private function __construct()
    {
    }

    public static function MyPdo()
    {
        self::getInstance();
        $pdo = new \PDO(self::DB_SERVER . ':host=' . self::HOST . ';dbname=' . self::DB_NAME . '', self::USER, self::PASSWORD);
        return $pdo;
    }

    public static function getInstance()
    {
        if (self::$_instance === null) {
            self::$_instance = new self;
        }
        return self::$_instance;
    }
}