<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Client.php';

/**
 * Contrôleur gérant linscription au site
 *
 * @author Baptiste Pesquet
 */
class ControleurInscription extends Controleur
{
    private $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function index()
    {
        $this->genererVue();
    }

    public function inscrire()
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

            $this->client->ajouterClient($nom, $prenom, $adresse, $codePostal, $ville, $courriel, $mdp);
            
            $client = $this->client->getClient($courriel, $mdp);
            $this->requete->getSession()->setAttribut("idClient",
                    $client['idClient']);
            $this->requete->getSession()->setAttribut("prenomClient",
                    $client['prenom']);
            $this->rediriger("accueil");
        }
        else
            throw new Exception("Action impossible : tous les paramètres ne sont pas définis");
    }

}
