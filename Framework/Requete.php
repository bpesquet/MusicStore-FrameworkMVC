<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Requete {

    private $parametres;

    public function __construct($parametres) {
        $this->parametres = $parametres;
    }

    public function existeParametre($nom) {
        return (isset($this->parametres[$nom]) && $this->parametres[$nom] != "");
    }
    
    public function getParametre($nom) {
        if ($this->existeParametre($nom)) {
            // Protection contre l'injection de code JavaScript
            $param = htmlentities($this->parametres[$nom], ENT_QUOTES);
            return $param;
        }
        else {
            // Paramètre absent de la requête
            throw new Exception("Paramètre '$nom' absent de la requête");
        }
    }

}

