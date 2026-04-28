<?php

require_once __DIR__ . '/../Models/CategoryModel.php';

class CategoryController {
    private $_model;

    public function __construct() {
        $this->_model = new CategoryModel();
    }

    private function requireAuth(): void {
        if (empty($_SESSION['user'])) {
            header('Location: index.php?page=auth&action=login');
            exit;
        }
    }

    public function list() {
        $this->requireAuth();
        return [
            'titre' => 'Gestion des catégories',
            'description' => 'Ajoutez, modifiez et supprimez les catégories de l’annuaire.',
            'categories' => $this->_model->list()
        ];
    }

    public function add() {
        $this->requireAuth();
        return [
            'titre' => 'Ajouter une catégorie',
            'description' => 'Créez une nouvelle catégorie pour classer les sites web.'
        ];
    }

    public function delete() {
        $this->requireAuth();
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if ($id) {
            $this->_model->delete($id);
        }

        header('Location: index.php?page=categorie&action=list');
        exit;
    }

    public function insert() {
        $this->requireAuth();

        if (!empty($_POST['libelle'])) {
            $libelle = trim($_POST['libelle']);
            $libelle = filter_var($libelle, FILTER_SANITIZE_SPECIAL_CHARS);

            if ($libelle !== '') {
                $this->_model->insert($libelle);
                header('Location: index.php?page=categorie&action=list');
                exit;
            }
        }

        header('Location: index.php?page=categorie&action=add');
        exit;
    }

    public function update() {
        $this->requireAuth();

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
            if (!$id) {
                header('Location: index.php?page=categorie&action=list');
                exit;
            }

            return [
                'titre' => 'Modifier une catégorie',
                'description' => 'Mettez à jour le libellé d’une catégorie.',
                'categorie' => $this->_model->selectById($id)
            ];
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
            $libelle = trim($_POST['libelle'] ?? '');
            $libelle = filter_var($libelle, FILTER_SANITIZE_SPECIAL_CHARS);

            if ($id && $libelle !== '') {
                $this->_model->update($id, $libelle);
            }

            header('Location: index.php?page=categorie&action=list');
            exit;
        }

        header('Location: index.php?page=categorie&action=list');
        exit;
    }
}
