<?php

/**
 * Description of Vue
 *
 * @author Baptiste Pesquet
 */
class Vue {

    private $fichier;
    
    // Racine du site Web (chemin vers le site sur le serveur Web)
    // Nécessaire pour les URI de type controleur/action/id
    private $racineWeb;

    public function __construct($action, $controleur = "") {
        // Détermination du nom du fichier vue à partir de l'action et du constructeur
        $fichier = "Vue/";
        if ($controleur != "") {
            $fichier = $fichier . $controleur . "/";
        }
        $this->fichier = $fichier . $action . ".php";

        //TODO à configurer
        $this->racineWeb = "/pesquet/MusicStore/";
    }

    public function generer($donnees) {
        if (file_exists($this->fichier)) {
            // Rend les éléments du tableau $donnees accessibles dans la vue
            extract($donnees);
            // On définit une variable locale accessible par la vue pour la racine Web
            $racineWeb = $this->racineWeb;
            // Inclut le fichier vue, ce qui déclenche son affichage
            require $this->fichier;
        }
        else {
            throw new Exception("Erreur interne : fichier '$this->fichier' introuvable");
        }
    }

}
