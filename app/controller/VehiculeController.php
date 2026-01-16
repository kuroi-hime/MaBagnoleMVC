<?php
    namespace APP\controller;

    use APP\model\Vehicule;
    use CONFIG\DataBase;

    class VehiculeController{
        static function section(){
            $pdo = DataBase::getPDO();
            $vehicules = Vehicule::allVehicules($pdo);
            ob_start();
            require_once 'app/view/partielles/sectionVehicules.php';
            return ob_get_clean();
        }

        static function view(){
            $pdo = DataBase::getPDO();
            $vehicules = Vehicule::allVehicules($pdo);
            ob_start();
            require_once 'app/view/partielles/paginatedVehicules.php';
            return ob_get_clean();
        }
    }
?>