<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Genre.php';
require_once 'Modele/Album.php';

class ControleurNavigation extends Controleur
{
    private $genre;
    private $album;

    public function __construct()
    {
        $this->genre = new Genre();
        $this->album = new Album();
    }

    public function index()
    {
        $genres = $this->genre->getGenres();
        $this->genererVue(array('genres' => $genres), "genre");
    }
    
    // navigation par genre musical
    public function genre()
    {
        $idGenre = null;
        $genreSelectionne = null;
        $albums = null;
        if ($this->requete->existeParametre("id")) {
            // Récupération des albums associés à un genre
            $idGenre = $this->requete->getParametre("id");
            $genreSelectionne = $this->genre->getGenre($idGenre);
            $albums = $this->album->getAlbumsParGenre($idGenre);
        }
        $genres = $this->genre->getGenres();

        $this->genererVue(array('albums' => $albums, 'genres' => $genres,
            'genreSelectionne' => $genreSelectionne));
    }

    /**
     * Détails sur un album
     */
    public function album()
    {
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
