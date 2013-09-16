<?php

/*
 * Classe modélisant une requête HTTP entrante
 * 
 * @author Baptiste Pesquet
 */
class Requete {

    // paramètres de la requête
    private $parametres;

    public function __construct($parametres) {
        $this->parametres = $parametres;
    }

    /**
     * Renvoie vrai si le paramètre existe dans la requête
     * 
     * @param type $nom
     * @return type
     */
    public function existeParametre($nom) {
        return (isset($this->parametres[$nom]) && $this->parametres[$nom] != "");
    }

    /**
     * Renvoie la valeur du paramètre demandé
     * 
     * @param type $nom
     * @return type
     * @throws Exception
     */
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

