<?php

require_once __DIR__ . '/../Models/CategoryModel.php';
require_once __DIR__ . '/../Models/SiteModel.php';

class HomeController {
    private CategoryModel $_categoryModel;
    private SiteModel $_siteModel;

    public function __construct() {
        $this->_categoryModel = new CategoryModel();
        $this->_siteModel = new SiteModel();
    }

    public function list() {
        return [
            'titre' => 'Annuaire de site web',
            'description' => 'Les Pages Orange vous permettent de rechercher des sites web par catégorie ou par mot-clé.',
            'categories' => $this->_categoryModel->list(),
            'sites' => $this->_siteModel->getLatestApproved(6)
        ];
    }
}
