<?php

require_once __DIR__ . '/../core/Model.php';

class CategoryModel extends Model {
    public function __construct() {
        parent::__construct();
        $this->_table = 'category';
    }

    public function insert(string $unLibelle) {
        $sth = $this->_pdo->prepare('INSERT INTO ' . $this->_table . ' (libelle) VALUES (:libelle)');
        $sth->bindParam(':libelle', $unLibelle, PDO::PARAM_STR);
        return $sth->execute();
    }

    public function update(int $unId, string $unLibelle) {
        $sth = $this->_pdo->prepare('UPDATE ' . $this->_table . ' SET libelle = :libelle WHERE id = :id');
        $sth->bindParam(':id', $unId, PDO::PARAM_INT);
        $sth->bindParam(':libelle', $unLibelle, PDO::PARAM_STR);
        return $sth->execute();
    }
}
