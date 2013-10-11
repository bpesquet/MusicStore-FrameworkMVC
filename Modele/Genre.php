<?php

require_once 'Framework/Modele.php';

class Genre extends Modele {

    public function getGenres() {
        $sql = "select G.GEN_ID as id, GEN_NOM as nom, count(ALB_ID) AS nbAlbums " .
                "from T_GENRE G left join T_ALBUM A on G.GEN_ID=A.GEN_ID group by G.GEN_ID order by GEN_NOM";
        return $this->executerRequete($sql);
    }

}

