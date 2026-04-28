<?php

class Router {
    private array $pages = [
        '' => 'HomeController',
        'Accueil' => 'HomeController',
        'categorie' => 'CategoryController',
        'auth' => 'AuthController',
        'site' => 'SiteController'
    ];

    public function run(): array {
        $page = $_GET['page'] ?? '';
        $action = $_GET['action'] ?? 'list';

        if (!array_key_exists($page, $this->pages)) {
            http_response_code(404);
            die('Page non trouvée');
        }

        $controllerName = $this->pages[$page];
        $controllerFile = 'Controllers/' . $controllerName . '.php';

        if (!file_exists($controllerFile)) {
            http_response_code(500);
            die('Contrôleur introuvable');
        }

        require_once $controllerFile;
        $controller = new $controllerName();

        if (!method_exists($controller, $action)) {
            http_response_code(404);
            die('Action non trouvée');
        }

        $data = $controller->$action();
        $folder = ($page === '' || $page === 'Accueil') ? 'Accueil' : ucfirst($page);
        $template = $folder . '/' . $action . '.tpl';

        return [
            'template' => $template,
            'data' => $data
        ];
    }
}
