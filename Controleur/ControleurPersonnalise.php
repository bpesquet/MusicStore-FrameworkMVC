<?php

require_once 'Framework/Controleur.php';

/**
 * Contrôleur abstrait pour les vues devant afficher les infos client
 * 
 * @author Baptiste Pesquet
 */
abstract class ControleurPersonnalise extends Controleur
{

    /**
     * Redéfinition permettant d'ajouter les infos clients aux données des vues 
     * 
     * @param type $donneesVue Données dynamiques
     * @param type $action Action associée à la vue
     */
    protected function genererVue($donneesVue = array(), $action = null)
    {
        $client = null;
        // Si les infos client sont présente dans la session...
        if ($this->requete->getSession()->existeAttribut("client")) {
            // ... on les récupère ...
            $client = $this->requete->getSession()->getAttribut("client");
        }
        // ... et on les ajoute aux données de la vue
        parent::genererVue($donneesVue + array('client' => $client), $action);
    }

}