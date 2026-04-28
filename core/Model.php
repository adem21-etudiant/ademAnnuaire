<?php

require_once __DIR__ . '/Db.php';

class Model {
    protected $_pdo;
    protected $_table;

    public function __construct() {
        $this->_pdo = Db::getInstance()->getPdo();
    }

    public function list() {
        $sql = "SELECT * FROM " . $this->_table . " ORDER BY id DESC";
        return $this->_pdo->query($sql)->fetchAll();
    }

    public function delete(int $id) {
        $sth = $this->_pdo->prepare("DELETE FROM " . $this->_table . " WHERE id = :id");
        $sth->bindParam(':id', $id, PDO::PARAM_INT);
        return $sth->execute();
    }

    public function selectById(int $id) {
        $sth = $this->_pdo->prepare("SELECT * FROM " . $this->_table . " WHERE id = :id");
        $sth->bindParam(':id', $id, PDO::PARAM_INT);
        $sth->execute();
        return $sth->fetch();
    }
}
