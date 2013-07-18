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

    public function get($id) {
        $sql = "select ALB_ID as id, ALB_NOM as nom, " .
                "G.GEN_ID as idGenre, GEN_NOM as nomGenre, " .
                "ART.ART_ID as idArtiste, ART_NOM as nomArtiste " .
                "from T_ALBUM ALB join T_GENRE G on ALB.GEN_ID=G.GEN_ID " .
                "join T_ARTISTE ART on ALB.ART_ID=ART.ART_ID " .
                "where ALB_ID=?";
        return $this->executerRequete($sql, array($id))->fetch();
    }

}

