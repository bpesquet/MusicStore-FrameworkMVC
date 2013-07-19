<?php

require_once 'Framework/Controleur.php';

require_once 'Modele/Genre.php';
require_once 'Modele/Album.php';
/**
 * Contrôleur de la page d'accueil
 * 
 * @author Baptiste Pesquet
 */
class ControleurAccueil extends Controleur {

    private $genre;
    private $album;

    public function __construct($action, Requete $requete) {
        parent::__construct($action, $requete);

        $this->genre = new Genre();
        $this->album = new Album();
    }

    /**
     * Action par défaut : page d'accueil
     */
    public function index() {
        $genres = $this->genre->getGenres();

        // Création de la liste des 6 albums les plus récents
        $albumsParDate = $this->album->getAlbumsParDate();
        $albumsRecents = array();
        $i = 0;
        while (($i < 6) && ($i < $albumsParDate->rowCount())) {
            $albumsRecents[] = $albumsParDate->fetch();
            $i++;
        }

        $this->genererVue(array('genres' => $genres, 'albumsRecents' => $albumsRecents));
    }

}
