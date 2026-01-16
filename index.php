<?php
require_once __DIR__ .'/vendor/autoload.php';
use APP\controller\AuthController;
use APP\controller\Controller;
use APP\controller\CategorieController;
use APP\controller\VehiculeController;
use APP\controller\AvisController;

$request = $_SERVER['REQUEST_URI'];
$path = explode('/', parse_url($request, PHP_URL_PATH))[2];

switch ($path) {
    case '':
        if(isset($_GET['error']))
            $data = ['error'=>$_GET['error']];
        AuthController::view($data??[]);
        break;
    case 'login':
        AuthController::login();
        break;
    case 'register':
        AuthController::register();
        break;
    case 'deconnexion':
        AuthController::logout();
        break;   
    case 'accueil':
        $data = ['sectionCategories'=>CategorieController::section(),
                 'sectionVehicules'=>VehiculeController::section(),
                 'sectionAvis'=>AvisController::section()
                ];
        Controller::view('accueil', $data);
        break;
    case 'voitures':
        $data = [];
        Controller::view('voitures', $data);
        break;
    case 'réservations':
        $data = [];
        Controller::view('reservations', $data);
        break;
    default:
        http_response_code(404);
        // require __DIR__ . '/views/404.php';
        break;
}