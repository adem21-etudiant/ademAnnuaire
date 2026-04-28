<?php

require_once __DIR__ . '/../Models/SiteModel.php';
require_once __DIR__ . '/../Models/CategoryModel.php';

class SiteController {
    private SiteModel $_siteModel;
    private CategoryModel $_categoryModel;

    public function __construct() {
        $this->_siteModel = new SiteModel();
        $this->_categoryModel = new CategoryModel();
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
            'titre' => 'Mes sites web',
            'description' => 'Gérez les sites web que vous avez ajoutés dans l’annuaire.',
            'sites' => $this->_siteModel->findByUser((int) $_SESSION['user']['id'])
        ];
    }

    public function add() {
        $this->requireAuth();

        return [
            'titre' => 'Ajouter un site web',
            'description' => 'Ajoutez un nouveau site à l’annuaire.',
            'categories' => $this->_categoryModel->list()
        ];
    }

    public function insert() {
        $this->requireAuth();

        $title = trim($_POST['titre'] ?? '');
        $url = trim($_POST['url'] ?? '');
        $description = trim($_POST['description'] ?? '');
        $categoryId = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);

        $errors = $this->validateSiteForm($title, $url, $description, $categoryId);

        if (!empty($errors)) {
            return [
                'titre' => 'Ajouter un site web',
                'description' => 'Ajoutez un nouveau site à l’annuaire.',
                'categories' => $this->_categoryModel->list(),
                'errors' => $errors,
                'old' => [
                    'titre' => htmlspecialchars($title, ENT_QUOTES),
                    'url' => htmlspecialchars($url, ENT_QUOTES),
                    'description' => htmlspecialchars($description, ENT_QUOTES),
                    'category_id' => $categoryId
                ]
            ];
        }

        $this->_siteModel->insert([
            'titre' => $title,
            'url' => $url,
            'description' => $description,
            'category_id' => $categoryId,
            'user_id' => (int) $_SESSION['user']['id']
        ]);

        header('Location: index.php?page=site&action=list');
        exit;
    }

    public function update() {
        $this->requireAuth();

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
            $site = $id ? $this->_siteModel->findOwnedById($id, (int) $_SESSION['user']['id']) : null;

            if (!$site) {
                header('Location: index.php?page=site&action=list');
                exit;
            }

            return [
                'titre' => 'Modifier un site web',
                'description' => 'Mettez à jour les informations de votre site.',
                'site' => $site,
                'categories' => $this->_categoryModel->list()
            ];
        }

        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        $title = trim($_POST['titre'] ?? '');
        $url = trim($_POST['url'] ?? '');
        $description = trim($_POST['description'] ?? '');
        $categoryId = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);

        $site = $id ? $this->_siteModel->findOwnedById($id, (int) $_SESSION['user']['id']) : null;
        if (!$site) {
            header('Location: index.php?page=site&action=list');
            exit;
        }

        $errors = $this->validateSiteForm($title, $url, $description, $categoryId);

        if (!empty($errors)) {
            return [
                'titre' => 'Modifier un site web',
                'description' => 'Mettez à jour les informations de votre site.',
                'site' => [
                    'id' => $id,
                    'titre' => htmlspecialchars($title, ENT_QUOTES),
                    'url' => htmlspecialchars($url, ENT_QUOTES),
                    'description' => htmlspecialchars($description, ENT_QUOTES),
                    'category_id' => $categoryId
                ],
                'categories' => $this->_categoryModel->list(),
                'errors' => $errors
            ];
        }

        $this->_siteModel->updateOwnedSite($id, (int) $_SESSION['user']['id'], [
            'titre' => $title,
            'url' => $url,
            'description' => $description,
            'category_id' => $categoryId
        ]);

        header('Location: index.php?page=site&action=list');
        exit;
    }

    public function delete() {
        $this->requireAuth();

        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if ($id) {
            $this->_siteModel->deleteOwnedSite($id, (int) $_SESSION['user']['id']);
        }

        header('Location: index.php?page=site&action=list');
        exit;
    }

    public function search() {
        $keyword = trim($_GET['keyword'] ?? '');
        $categoryId = filter_input(INPUT_GET, 'category_id', FILTER_VALIDATE_INT);
        $categoryId = $categoryId ?: null;

        return [
            'titre' => 'Rechercher dans l’annuaire',
            'description' => 'Recherchez un site par catégorie et par mot-clé.',
            'categories' => $this->_categoryModel->list(),
            'sites' => $this->_siteModel->searchPublic($keyword, $categoryId),
            'keyword' => htmlspecialchars($keyword, ENT_QUOTES),
            'selectedCategory' => $categoryId
        ];
    }

    private function validateSiteForm(string $title, string $url, string $description, $categoryId): array {
        $errors = [];

        if ($title === '') {
            $errors[] = 'Le titre est obligatoire.';
        }

        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            $errors[] = 'Veuillez saisir une URL valide.';
        }

        if ($description === '') {
            $errors[] = 'La description est obligatoire.';
        }

        if (empty($categoryId)) {
            $errors[] = 'Veuillez choisir une catégorie.';
        }

        return $errors;
    }
}
