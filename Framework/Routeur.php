<?php

require_once 'Controleur.php';
require_once 'Requete.php';
require_once 'Vue.php';

/*
 * Classe de routage des requêtes entrantes.
 */

class Routeur {

    /**
     * Méthode principale appelée par le contrôleur frontal
     * Examine la requête et exécute l'action appropriée
     */
    public function traiterRequete() {
        try {
            $controleur = $this->creerControleur();
            $controleur->executerAction();
        }
        catch (Exception $e) {
            $this->gererErreur($e);
        }
    }

    private function creerControleur() {
        $requete = new Requete($_GET);
        
        $controleur = "Accueil";
        if ($requete->existeParametre('controleur')) {
            $controleur = $requete->getParametre('controleur');
        }
        $action = "index";  // Action par défaut
        if ($requete->existeParametre('action')) {
            $action = $requete->getParametre('action');
        }
        $classeControleur = "Controleur" . $controleur;
        $fichierControleur = "Controleur/" . $classeControleur . ".php";
        if (file_exists($fichierControleur)) {
            require($fichierControleur);
            return new $classeControleur($action, $requete);
        }
        else {
            throw new Exception("Erreur interne : fichier '$fichierControleur' introuvable");
        }
    }

    /**
     * Gère une erreur d'exécution (exception)
     * 
     * @param type $exception L'exception qui s'est produite
     */
    private function gererErreur(Exception $exception) {
        $vueErreur = new Vue('erreur');
        $vueErreur->generer(array('msgErreur' => $exception->getMessage()));
    }

}
