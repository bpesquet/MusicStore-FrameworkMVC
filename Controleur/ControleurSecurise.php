<?php

require_once 'ControleurPersonnalise.php';

/**
 * Contrôleur abstrait pour les actions soumises à authentification du client
 * 
 * @author Baptiste Pesquet
 */
abstract class ControleurSecurise extends ControleurPersonnalise
{

    /**
     * Redéfinition permettant de vérifier qu'un client est connecté
     * 
     * @param type $action
     */
    public function executerAction($action)
    {
        // Si les infos client sont présentes dans la session ...
        if ($this->requete->getSession()->existeAttribut("client")) {
            // ... l'action s'exécute normalement ...
            parent::executerAction($action);
        }
        else {
            // ... ou l'utilisateur est redirigé vers la page de connexion
            $this->rediriger("connexion");
        }
    }

}