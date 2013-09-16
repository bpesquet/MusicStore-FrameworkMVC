<?php

require_once 'Framework/Controleur.php';

require_once 'Modele/Genre.php';
require_once 'Modele/Album.php';
/**
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

    /**
     * Action par défaut : navigation par genre musical
     */
    public function index() {
        $idGenre = null;
        $nomGenre = null;
        $albums = null;
        if ($this->requete->existeParametre("id")) {
            // Récupération des albums associés à un genre
            $idGenre = $this->requete->getParametre("id");
            $nomGenre = $this->genre->getGenre($idGenre)["nom"];
            $albums = $this->album->getAlbumsGenre($idGenre);
        }
        $genres = $this->genre->getGenres();

        $this->genererVue(array('albums' => $albums, 'genres' => $genres,
            'nomGenre' => $nomGenre, 'idGenre' => $idGenre));
    }

    /**
     * Détails sur un album
     */
    public function album() {
        $album = null;
        $idGenre = null;
        $nomGenre = null;
        $idAlbum = null;
        $nomAlbum = null;
        if ($this->requete->existeParametre("id")) {
            $idAlbum = $this->requete->getParametre("id");
            $album = $this->album->getAlbum($idAlbum);
            $idGenre = $album['idGenre'];
            $nomGenre = $album['nomGenre'];
            $idAlbum = $album['id'];
            $nomAlbum = $album['nom'];
        }
        $genres = $this->genre->getGenres();

        $this->genererVue(array('album' => $album, 'genres' => $genres,
            'nomGenre' => $nomGenre, 'idGenre' => $idGenre,
            'nomAlbum' => $nomAlbum, 'idAlbum' => $idAlbum));
    }

}
