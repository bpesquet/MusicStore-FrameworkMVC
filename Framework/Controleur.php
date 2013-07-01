<?php

require_once 'Requete.php';

/**
 * Classe abstraite Controleur
 * Fournit des services communs aux classes Controleur dérivées
 * 
 * @author Baptiste Pesquet
 */
abstract class Controleur {

    protected $requete;
    private $action;

    public function __construct(Requete $requete) {
        $this->requete = $requete;
    }

    public function executerAction() {
        $this->action = "index";
        if ($this->requete->existeParametre("action")) {
            $this->action = $this->requete->getParametre("action");
        }
        if (method_exists($this, $this->action)) {
            return $this->{$this->action}();
        }
        else {
            $classeControleur = get_class($this);
            throw new Exception("Action '$this->action' non définie dans la classe $classeControleur");
        }
    }

    protected function genererVue($donnees = array()) {
        $classeControleur = get_class($this);
        $nomControleur = str_replace("Controleur", "", $classeControleur);
        $fichierVue = "Vue/" . $nomControleur . "/" . $this->action . ".php";
        if (file_exists($fichierVue)) {
            // Rend les éléments du tableau $donnees accessibles dans la vue
            extract($donnees);
            // Inclut la vue, ce qui déclenche son affichage
            require $fichierVue;
        }
        else {
            throw new Exception("Fichier '$fichierVue' introuvable");
        }
    }

}
