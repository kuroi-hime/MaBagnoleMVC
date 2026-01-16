<?php
namespace APP\controller;

use APP\model\Vehicule;
use CONFIG\DataBase;

class Controller {
    static function view($view, $data){
        extract($data);
        session_start();
        ob_start();
        require_once "app/view/$view.php";
        $content = ob_get_clean();

        require_once 'app/view/layout.php';
    }
}