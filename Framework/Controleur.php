<?php

/**
 * Classe abstraite Controleur
 * Fournit des services communs aux classes Controleur dérivées
 * 
 * @author Baptiste Pesquet
 */
abstract class Controleur {

    private $action;
    protected $requete;

    public function __construct($action, Requete $requete) {
        $this->action = $action;
        $this->requete = $requete;
    }

    public function executerAction() {
        if (method_exists($this, $this->action)) {
            return $this->{$this->action}();
        }
        else {
            $classeControleur = get_class($this);
            throw new Exception("Erreur interne : action '$this->action' non définie dans la classe $classeControleur");
        }
    }

    protected function genererVue($donneesVue = array()) {
        // déduction du nom du fichier vue à partir du nom du contrôleur actuel
        $classeControleur = get_class($this);
        $controleur = str_replace("Controleur", "", $classeControleur);
        
        $vue = new Vue($this->action, $controleur);
        $vue->generer($donneesVue);
    }

}
