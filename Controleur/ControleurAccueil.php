<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Genre.php';
/**
 * Contrôleur de la page d'accueil
 * 
 * @author Baptiste Pesquet
 */
class ControleurAccueil extends Controleur {

    private $genre;

    public function __construct($action, Requete $requete) {
        parent::__construct($action, $requete);

        $this->genre = new Genre();
    }

    public function index() {
        $genres = $this->genre->getGenres(true);

        $this->genererVue(array('genres' => $genres));
    }

}
