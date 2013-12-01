<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Genre.php';

class ControleurAccueil extends Controleur {

    private $genre;
    
    public function __construct() {
        $this->genre = new Genre();
    }
    
    // Affiche la page d'accueil
    public function index() {
        $genres = $this->genre->getGenres();
        $prenomClient = null;
        if ($this->requete->getSession()->existeAttribut("prenomClient")) {
            $prenomClient = $this->requete->getSession()->getAttribut("prenomClient");
        }
        $this->genererVue(array('genres' => $genres, 'prenomClient' => $prenomClient));
    }

}
