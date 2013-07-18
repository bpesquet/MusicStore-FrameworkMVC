<?php

require_once 'Framework/Controleur.php';

require_once 'Modele/Genre.php';
require_once 'Modele/Album.php';
require_once 'Modele/Artiste.php';

/*
 * Contrôleur de la page d'accueil
 * 
 * @author Baptiste Pesquet
 */
class ControleurNavigation extends Controleur {

    private $genre;
    private $album;
    private $artiste;

    public function __construct($action, Requete $requete) {
        parent::__construct($action, $requete);

        $this->genre = new Genre();
        $this->album = new Album();
        $this->artiste = new Artiste();
    }

    /**
     * Action par défaut : navigation par genre musical
     */
    public function index() {
        $idGenre = null;
        $nomGenre = null;
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
            'nomGenre' => $nomGenre, 'idGenre' => $idGenre));
    }

    public function artiste() {
        $idArtiste = $this->requete->getParametre("id");
        $artiste = $this->artiste->get($idArtiste);
        $idGenre = $artiste['idGenre'];
        $nomGenre = $artiste['nomGenre'];
        $idArtiste = $artiste['idArtiste'];
        $nomArtiste = $artiste['nomArtiste'];

        $genres = $this->genre->getGenres();

        $this->genererVue(array('artiste' => $artiste, 'genres' => $genres,
            'nomGenre' => $nomGenre, 'idGenre' => $idGenre,
            'nomArtiste' => $nomArtiste, 'idArtiste' => $idArtiste));
    }
    
    public function album() {
        $idAlbum = $this->requete->getParametre("id");
        $album = $this->album->get($idAlbum);
        $idGenre = $album['idGenre'];
        $nomGenre = $album['nomGenre'];
        $idArtiste = $album['idArtiste'];
        $nomArtiste = $album['nomArtiste'];

        $genres = $this->genre->getGenres();

        $this->genererVue(array('album' => $album, 'genres' => $genres,
            'nomGenre' => $nomGenre, 'idGenre' => $idGenre,
            'nomArtiste' => $nomArtiste, 'idArtiste' => $idArtiste));
    }

}
