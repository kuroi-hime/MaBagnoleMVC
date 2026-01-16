<?php
    namespace APP\controller;
    use APP\model\Categorie;
    use CONFIG\DataBase;

    class CategorieController{
        static function section(){
            $pdo = DataBase::getPDO();
            $categories = Categorie::allCategories($pdo);
            $min = min(count($categories), 4);
            ob_start();
            require_once 'app/view/partielles/sectionCategories.php';
            return ob_get_clean();
        }

        static function side(){
            $pdo = DataBase::getPDO();
            $categories = Categorie::allCategories($pdo);
            ob_start();
            require_once 'app/view/partielles/sideCategories.php';
            return ob_get_clean();
        }
    }
?>