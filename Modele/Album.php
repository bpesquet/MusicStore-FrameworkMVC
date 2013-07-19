<?php

require_once 'Framework/Modele.php';
/**
 * Fournit les services d'accès aux albums
 *
 * @author Baptiste Pesquet
 */
class Album extends Modele {

    public function getAlbumsParGenre($idGenre) {
        $sql = "select ALB_ID as id, ALB_NOM as nom from T_ALBUM where GEN_ID=? order by ALB_NOM";
        return $this->executerRequete($sql, array($idGenre));
    }

    public function getAlbum($id) {
        $sql = "select ALB_ID as id, ALB_NOM as nom, " .
                "ART.ART_ID as idArtiste, ART_NOM as nomArtiste, " .
                "G.GEN_ID as idGenre, GEN_NOM as nomGenre " .
                "from T_ALBUM A join T_ARTISTE ART on A.ART_ID=ART.ART_ID " .
                "join T_GENRE G on A.GEN_ID=G.GEN_ID " .
                "where ALB_ID=?";
        $stmtResultats = $this->executerRequete($sql, array($id));
        if ($stmtResultats->rowCount() > 0) {
            return $stmtResultats->fetch();  // Accès à la première ligne de résultat
        }
        else {
            throw new Exception("Aucun album ne correspond à l'identifiant '$id'");
        }
    }

}

