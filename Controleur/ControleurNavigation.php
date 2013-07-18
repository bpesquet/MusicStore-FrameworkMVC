<?php

require_once 'Framework/Controleur.php';

require_once 'Modele/Genre.php';
require_once 'Modele/Album.php';

/*
 * Contrôleur de la page d'accueil
 * 
 * @author Baptiste Pesquet
 */
class ControleurNavigation extends Controleur {

    private $genre;
    private $album;

    public function __construct($action, Requete $requete) {
        parent::__construct($action, $requete);

        $this->genre = new Genre();
        $this->album = new Album();
    }

    public function index() {
        if ($this->requete->existeParametre("id")) {
            // Récupération des albums associés à un genre
            $idGenre = $this->requete->getParametre("id");
            $nomGenre = $this->genre->getNom($idGenre);
            $albums = $this->album->getAlbums($idGenre);
        }
        else {
            // Récupération de tous les albums
            $albums = $this->album->getAlbums();
        }
        
        $genres = $this->genre->getGenres();

        $this->genererVue(array('albums' => $albums, 'genres' => $genres, 
            'nomGenre' => $nomGenre));
    }

}
