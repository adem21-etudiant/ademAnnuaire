<?php

class Db {
    private static $_instance = null;
    private $_pdo;

    private function __construct() {
        $this->_pdo = new PDO(
            "mysql:host=192.168.56.101;dbname=annuaire_pages_orange;charset=utf8mb4",
            "adem",
            "etudiant",
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ]
        );
    }

    public static function getInstance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new Db();
        }
        return self::$_instance;
    }

    public function getPdo() {
        return $this->_pdo;
    }
}