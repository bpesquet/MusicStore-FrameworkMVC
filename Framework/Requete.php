<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Requete {

    private $parametres;

    public function __construct() {
        if (!empty($_GET)) {
            $this->parametres = $_GET;
        }
        elseif (!empty($_POST)) {
            $this->parametres = $_POST;
        }
    }

    public function existeParametre($nom) {
        return (isset($this->parametres[$nom]));
    }
    
    public function getParametre($nom) {
        if (isset($this->parametres[$nom])) {
            // Protection contre l'injection de code
            $param = htmlentities($this->parametres[$nom], ENT_QUOTES);
            return $param;
        }
        else {
            // Paramètre absent de la requête
            throw new Exception("Paramètre '$nom' absent de la requête");
        }
    }

}

