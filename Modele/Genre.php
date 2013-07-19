<?php

require_once 'Framework/Modele.php';
/**
 * Fournit les services d'accès aux genres musicaux
 *
 * @author Baptiste Pesquet
 */
class Genre extends Modele {

    public function getGenres($compterAlbums = false) {
        if ($compterAlbums) {
            $sql = "select G.GEN_ID as id, GEN_NOM as nom, count(ALB_ID) AS nbAlbums " .
                    "from T_GENRE G left join T_ALBUM A on G.GEN_ID=A.GEN_ID group by G.GEN_ID order by GEN_NOM";
        }
        else {
            $sql = "select GEN_ID as id, GEN_NOM as nom from T_GENRE order by GEN_NOM";
        }
        return $this->executerRequete($sql);
    }

    public function getGenre($id) {
        $sql = "select GEN_NOM as nom from T_GENRE where GEN_ID=?";
        $stmtResultats = $this->executerRequete($sql, array($id));
        if ($stmtResultats->rowCount() > 0) {
            return $stmtResultats->fetch();  // Accès à la première ligne de résultat
        }
        else {
            throw new Exception("Aucun genre musical ne correspond à l'identifiant '$id'");
        }
    }

}

