<?php

require_once 'ControleurSite.php';
require_once 'Modele/Genre.php';

class ControleurAccueil extends ControleurSite {

    private $genre;
    
    public function __construct() {
        $this->genre = new Genre();
    }
    
    // Affiche la page d'accueil
    public function index() {
        $genres = $this->genre->getGenres();
        $this->genererVue(array('genres' => $genres));
    }

}
