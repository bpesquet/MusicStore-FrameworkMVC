<?php

require_once 'Framework/Modele.php';
/**
 * Fournit les services d'accès aux artistes
 *
 * @author Baptiste Pesquet
 */
class Artiste extends Modele {

    public function getArtiste($id) {
        $sql = "select ART_ID as id, ART_NOM as nom from T_ARTISTE where ART_ID=?";
        $stmtResultats = $this->executerRequete($sql, array($id));
        if ($stmtResultats->rowCount() > 0) {
            return $stmtResultats->fetch();  // Accès à la première ligne de résultat
        }
        else {
            throw new Exception("Aucun artiste ne correspond à l'identifiant '$id'");
        }
    }

}

