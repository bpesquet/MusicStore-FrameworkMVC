<?php

require_once 'Framework/Modele.php';
/**
 * Fournit les services d'accès aux albums
 *
 * @author Baptiste Pesquet
 */
class Album extends Modele {

    public function getAlbums($idGenre = null) {
        if ($idGenre != null) {
            $sql = "select ALB_ID as id, ALB_NOM as nom from T_ALBUM where gen_id=? order by ALB_NOM";
            $stmtResultats = $this->executerRequete($sql, array($idGenre));
        }
        else {
            $sql = "select ALB_ID as id, ALB_NOM as nom from T_ALBUM order by ALB_NOM";
            $stmtResultats = $this->executerRequete($sql);
        }
        return $stmtResultats;
    }

}

