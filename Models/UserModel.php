<?php

require_once __DIR__ . '/../core/Model.php';

class UserModel extends Model {
    public function __construct() {
        parent::__construct();
        $this->_table = 'users';
    }

    public function insert(string $email, string $password) {
        $sth = $this->_pdo->prepare('INSERT INTO users (email, password) VALUES (:email, :password)');
        $sth->bindParam(':email', $email, PDO::PARAM_STR);
        $sth->bindParam(':password', $password, PDO::PARAM_STR);
        return $sth->execute();
    }

    public function findByEmail(string $email) {
        $sth = $this->_pdo->prepare('SELECT * FROM users WHERE email = :email LIMIT 1');
        $sth->bindParam(':email', $email, PDO::PARAM_STR);
        $sth->execute();
        return $sth->fetch();
    }
}
