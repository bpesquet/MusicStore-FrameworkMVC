<?php

require_once 'ControleurSecurise.php';
require_once 'Modele/Panier.php';

/**
 * Contrôleur des actions liées au panier
 * 
 * @author Baptiste Pesquet
 */
class ControleurPanier extends ControleurSecurise
{
    private $panier;

    public function __construct()
    {
        $this->panier = new Panier();
    }

    /**
     * Affiche la page de modification des infos client
     */
    public function index()
    {
        $client = $this->requete->getSession()->getAttribut("client");
        $idClient = $client['idClient'];
        $articles = $this->panier->getArticles($idClient);
        $this->genererVue(array('articles' => $articles));
    }

    public function ajouter()
    {
        if ($this->requete->existeParametre("id")) {
            $idAlbum = $this->requete->getParametre("id");
            $client = $this->requete->getSession()->getAttribut("client");
            $idClient = $client['idClient'];
            $this->panier->ajouterArticle($idClient, $idAlbum);
            $this->executerAction("index");
        }
        else
            throw new Exception("Action impossible : aucun album défini");
    }

}