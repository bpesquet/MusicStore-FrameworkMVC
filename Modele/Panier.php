<?php

require_once 'Framework/Modele.php';

/**
 * Services liés aux paniers
 */
class Panier extends Modele
{

    public function getArticles($idClient)
    {
        $sql = "select ARTPAN_ID as id, AP.ALB_ID as idAlbum, CLI_ID as idClient, ARTPAN_QUANTITE as quantite,
            ALB_PRIX as prixAlbum, ALB_PRIX*ARTPAN_QUANTITE as prixTotal,
            ALB_NOM as nomAlbum from T_ARTICLE_PANIER AP join T_ALBUM ALB on AP.ALB_ID=ALB.ALB_ID where CLI_ID=?
            order by ALB_NOM";
        return $this->executerRequete($sql, array($idClient));
    }

    public function getNbArticles($idClient)
    {
        $sql = "select count(ARTPAN_ID) as nbArticles from T_ARTICLE_PANIER where CLI_ID=?";
        $resultat = $this->executerRequete($sql, array($idClient));
        $ligne = $resultat->fetch();
        return $ligne['nbArticles'];
    }

    public function getPrixTotal($idClient) {
        $sql = "select sum(ALB_PRIX*ARTPAN_QUANTITE) as prixTotal 
            from T_ARTICLE_PANIER AP join T_ALBUM ALB on AP.ALB_ID=ALB.ALB_ID where CLI_ID=?";
        $resultat = $this->executerRequete($sql, array($idClient));
        $ligne = $resultat->fetch();
        return $ligne['prixTotal'];
    }
    
    public function ajouterAlbum($idClient, $idAlbum)
    {
        $sql = "select * from T_ARTICLE_PANIER where CLI_ID=? and ALB_ID=?";
        $resultat = $this->executerRequete($sql, array($idClient, $idAlbum));
        if ($resultat->rowCount() > 0) {
            // album déjà commandé par ce client : on augmente sa quantité de 1
            $sql = 'update T_ARTICLE_PANIER set ARTPAN_QUANTITE=ARTPAN_QUANTITE+1
                where CLI_ID=? and ALB_ID=?';
        }
        else {
            // on crée un nouvel article
            $sql = 'insert into T_ARTICLE_PANIER(CLI_ID, ALB_ID) values (?, ?)';
        }
        $this->executerRequete($sql, array($idClient, $idAlbum));
    }

}
