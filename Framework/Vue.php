<?php

require_once 'Configuration.php';
/**
 * Classe modélisant une vue
 *
 * @author Baptiste Pesquet
 */
class Vue {

    // Nom du fichier associé à la vue
    private $fichier;

    public function __construct($action, $controleur = "") {
        // Détermination du nom du fichier vue à partir de l'action et du constructeur
        $fichier = "Vue/";
        if ($controleur != "") {
            $fichier = $fichier . $controleur . "/";
        }
        $this->fichier = $fichier . $action . ".php";
    }

    /**
     * Génère la vue
     * 
     * @param type $donnees
     * @throws Exception
     */
    public function generer($donnees) {
        if (file_exists($this->fichier)) {
            // Rend les éléments du tableau $donnees accessibles dans la vue
            extract($donnees);
            // On définit une variable locale accessible par la vue pour la racine Web
            // Il s'agit du chemin vers le site sur le serveur Web
            // Nécessaire pour les URI de type controleur/action/id
            $racineWeb = Configuration::get("racineWeb");
            // Inclut le fichier vue, ce qui déclenche son affichage
            require $this->fichier;
        }
        else {
            throw new Exception("Erreur interne : fichier '$this->fichier' introuvable");
        }
    }

}
