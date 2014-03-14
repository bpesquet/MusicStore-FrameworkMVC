<?php

require_once 'Framework/Modele.php';

/**
 * Services liés aux genres musicaux
 *
 * @author Baptiste Pesquet
 */
class Genre extends Modele
{
    /**
     * Renvoie la liste de tous les genres
     * 
     * @return type
     */
    public function getGenres()
    {
        $sql = "select G.GEN_ID as id, GEN_NOM as nom, count(ALB_ID) AS nbAlbums " .
                "from T_GENRE G left join T_ALBUM A on G.GEN_ID=A.GEN_ID group by G.GEN_ID order by GEN_NOM";
        return $this->executerRequete($sql);
    }

    /**
     * Renvoie les infos sur un genre
     * 
     * @param type $id
     * @return type
     * @throws Exception
     */
    public function getGenre($id)
    {
        $sql = "select GEN_ID as id, GEN_NOM as nom from T_GENRE where GEN_ID=?";
        $genre = $this->executerRequete($sql, array($id));
        if ($genre->rowCount() == 1) {
            return $genre->fetch();  // Accès à la première ligne de résultat
        }
        else {
            throw new Exception("Aucun genre musical ne correspond à l'identifiant '$id'");
        }
    }

}

