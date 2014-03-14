<?php

require_once 'ControleurPersonnalise.php';
require_once 'Modele/Genre.php';
require_once 'Modele/Album.php';

/**
 * Contrôleur des actions de navigation sur le site
 * 
 * @author Baptiste Pesquet
 */
class ControleurNavigation extends ControleurPersonnalise
{
    private $genre;
    private $album;

    public function __construct()
    {
        $this->genre = new Genre();
        $this->album = new Album();
    }

    /**
     * Affiche le genre musical sélectionné
     */
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

    /**
     * Affiche les détails sur un album
     * 
     * @throws Exception Si aucun album sélectionné
     */
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
