<?php

require_once __DIR__ . '/../Models/UserModel.php';

class AuthController {
    private UserModel $_model;

    public function __construct() {
        $this->_model = new UserModel();
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';

            $user = $this->_model->findByEmail($email);

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user'] = [
                    'id' => $user['id'],
                    'email' => $user['email'],
                    'role' => $user['role']
                ];

                header('Location: index.php?page=site&action=list');
                exit;
            }

            return [
                'titre' => 'Connexion',
                'description' => 'Connectez-vous pour gérer vos sites.',
                'error' => 'Email ou mot de passe incorrect.'
            ];
        }

        return [
            'titre' => 'Connexion',
            'description' => 'Connectez-vous pour gérer vos sites.'
        ];
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';
            $confirmPassword = $_POST['confirm_password'] ?? '';

            $errors = [];

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = 'Veuillez saisir un email valide.';
            }

            if (strlen($password) < 6) {
                $errors[] = 'Le mot de passe doit contenir au moins 6 caractères.';
            }

            if ($password !== $confirmPassword) {
                $errors[] = 'Les mots de passe ne correspondent pas.';
            }

            if ($this->_model->findByEmail($email)) {
                $errors[] = 'Cet email est déjà utilisé.';
            }

            if (empty($errors)) {
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $this->_model->insert($email, $hash);
                header('Location: index.php?page=auth&action=login');
                exit;
            }

            return [
                'titre' => 'Inscription',
                'description' => 'Créez votre compte utilisateur.',
                'errors' => $errors,
                'old_email' => htmlspecialchars($email, ENT_QUOTES)
            ];
        }

        return [
            'titre' => 'Inscription',
            'description' => 'Créez votre compte utilisateur.'
        ];
    }

    public function logout() {
        unset($_SESSION['user']);
        session_destroy();
        header('Location: index.php');
        exit;
    }
}
