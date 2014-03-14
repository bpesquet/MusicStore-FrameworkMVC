<?php

require_once 'ControleurSecurise.php';
require_once 'Modele/Client.php';

/**
 * Contrôleur des actions liées au client
 * 
 * @author Baptiste Pesquet
 */
class ControleurClient extends ControleurSecurise
{
    private $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    /**
     * Affiche la page de modification des infos client
     */
    public function index()
    {
        $this->genererVue();
    }

    /**
     * Modifie les infos client
     * 
     * @throws Exception S'il manque des infos clients
     */
    public function modifier()
    {
        if ($this->requete->existeParametre("nom") && $this->requete->existeParametre("prenom") &&
                $this->requete->existeParametre("adresse") && $this->requete->existeParametre("codePostal") &&
                $this->requete->existeParametre("ville") && $this->requete->existeParametre("courriel") &&
                $this->requete->existeParametre("mdp")) {
            $nom = $this->requete->getParametre("nom");
            $prenom = $this->requete->getParametre("prenom");
            $adresse = $this->requete->getParametre("adresse");
            $codePostal = $this->requete->getParametre("codePostal");
            $ville = $this->requete->getParametre("ville");
            $courriel = $this->requete->getParametre("courriel");
            $mdp = $this->requete->getParametre("mdp");

            $client = $this->requete->getSession()->getAttribut("client");
            $idClient = $client['idClient'];
            $this->client->modifierClient($idClient, $nom, $prenom, $adresse, $codePostal,
                    $ville, $courriel, $mdp);
            
            $client = $this->client->getClientParId($idClient);
            $this->requete->getSession()->setAttribut("client", $client);
            $this->genererVue();
        }
        else
            throw new Exception("Action impossible : tous les paramètres ne sont pas définis");
    }

}
