<?php
namespace APP\controller;

use APP\model\Client;
use APP\model\Utilisateur;
use CONFIG\DataBase;
use Exception;

class AuthController {

    static function view($data = []){ //Get
        extract($data);
        require_once 'app/view/authentification.php';
    }

    static function register(){ //Post
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $pdo = DataBase::getPDO();
                $client = new Client();
                $client->setNom($_POST['nom']);
                $client->setEmail($_POST['email']);
                $client->setMotDePassHash($_POST['password']);
                $client->setCIN($_POST['cin']);
                $client->setTelephone($_POST['telephone']);
                $client->setAdresse($_POST['adresse']);
                $client->setVille($_POST['ville']);

                Client::inscription($pdo, $client);
                
                header('Location:/MVCTraining/?success=compte_cree');
                exit();
            } catch (Exception $e) {
                header('Location:/register?error=' . urlencode($e->getMessage()));
            }
        }
    }

    static function login(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $pdo = DataBase::getPDO();
                $currentUser = Utilisateur::connexion($pdo, $_POST['email'], $_POST['password']);

                session_start();
                $_SESSION['id'] = $currentUser->getId();
                $_SESSION['name'] = $currentUser->getNom();
                $_SESSION['role'] = $currentUser->getRole();

                if ($currentUser->getRole() == 'client') {
                    header('Location:/MVCTraining/accueil');
                } else {
                    header('Location:/MVCTraining/dashboard-admin');
                }
                exit();
            } catch (Exception $e) {
                session_start();
                $_SESSION['old_email'] = $_POST['email'];
                header('Location:/MVCTraining/?error=' . urlencode($e->getMessage()));
                exit();
            }
        }
    }

    static function logout(){
        // session_abort();
        session_start();
        session_destroy();
        header('Location:/MVCTraining');
    }
}