<?php

require_once 'Framework/Modele.php';

class Album extends Modele
{

    public function getAlbumsParGenre($idGenre)
    {
        $sql = "select ALB_ID as id, ALB_NOM as nom, ALB_IMAGE as image from T_ALBUM where GEN_ID=? order by ALB_NOM";
        return $this->executerRequete($sql, array($idGenre));
    }

}