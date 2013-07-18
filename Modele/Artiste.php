<?php

require_once 'Framework/Modele.php';

/**
 * Fournit les services d'accès aux artistes
 *
 * @author Baptiste Pesquet
 */
class Artiste extends Modele {
    public function get($id) {
        $sql = "select ART_ID as id, ART_NOM as nom, " .
                "G.GEN_ID as idGenre, GEN_NOM as nomGenre " .
                "from T_ARTISTE A join T_GENRE G on A.GEN_ID=G.GEN_ID " .
                "where ART_ID=?";
        return $this->executerRequete($sql, array($id))->fetch();
    }
}

