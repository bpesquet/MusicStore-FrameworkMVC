<?php

require_once 'Requete.php';

/*
 * Classe de routage des requêtes entrantes (contrôleur frontal)
 */

class Routeur {

    /**
     * Méthode principale du contrôleur frontal.
     * Examine les paramètres de l'URL et exécute l'action à entreprendre 
     */
    public function routerRequete() {
        try {
            $requete = new Requete();
            $controleur = $this->creerControleur($requete);
            $controleur->executerAction();
        }
        catch (Exception $e) {
            $this->gererErreur($e);
        }
    }

    private function creerControleur(Requete $requete) {
        $nomControleur = "Accueil";
        if ($requete->existeParametre("controleur")) {
            $nomControleur = $requete->getParametre("controleur");
        }
        $classeControleur = "Controleur" . $nomControleur;
        $fichierControleur = "Controleur/" . $classeControleur . ".php";
        if (file_exists($fichierControleur)) {
            require($fichierControleur);
            return new $classeControleur($requete);
        }
        else {
            throw new Exception("Fichier $fichierControleur introuvable");
        }
    }

    /**
     * Gère une erreur d'exécution (exception)
     * 
     * @param type $exception L'exception qui s'est produite
     */
    private function gererErreur(Exception $exception) {
        $msgErreur = $exception->getMessage();
        require 'Vue/erreur.php';
    }

}
