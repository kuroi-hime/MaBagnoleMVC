<?php
    namespace APP\controller;
    use APP\model\Commentaire;
    use CONFIG\DataBase;

    class AvisController{
        static function section(){
            $pdo = DataBase::getPDO();
            $commentaires = Commentaire::allCommentaires($pdo);
            $avis = count($commentaires);
            $noteTotal = 0;
            foreach($commentaires as $commentaire)
                $noteTotal += $commentaire->note;
            $noteMoy = $noteTotal/$avis;
            ob_start();
            require_once 'app/view/partielles/sectionAvis.php';
            return ob_get_clean();
        }
    }
?>