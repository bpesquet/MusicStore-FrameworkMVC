<?php

require_once 'ControleurPersonnalise.php';
require_once 'Modele/Genre.php';

/**
 * Contrôleur de la page d'accueil
 * 
 * @author Baptiste Pesquet
 */
class ControleurAccueil extends ControleurPersonnalise {

    private $genre;
    
    public function __construct() {
        $this->genre = new Genre();
    }
    
    /**
     * Affiche la page d'accueil
     */
    public function index() {
        $genres = $this->genre->getGenres();
        $this->genererVue(array('genres' => $genres));
    }

}
