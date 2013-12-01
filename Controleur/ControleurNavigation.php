<?php

require_once 'ControleurSite.php';
require_once 'Modele/Genre.php';
require_once 'Modele/Album.php';

class ControleurNavigation extends ControleurSite
{
    private $genre;
    private $album;

    public function __construct()
    {
        $this->genre = new Genre();
        $this->album = new Album();
    }

    // navigation par genre musical
    public function index()
    {
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

    public function album()
    {
        if ($this->requete->existeParametre("id")) {
            $idAlbum = $this->requete->getParametre("id");
            $album = $this->album->getAlbum($idAlbum);
            $idGenre = $album['idGenre'];
            $genreSelectionne = $this->genre->getGenre($idGenre);
            $genres = $this->genre->getGenres();
            $this->genererVue(array('album' => $album, 'genres' => $genres,
                'genreSelectionne' => $genreSelectionne));
        }
        else
            throw new Exception("Action impossible : aucun album défini");
    }

}
