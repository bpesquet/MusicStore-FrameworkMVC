<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Client.php';

/**
 * Contrôleur gérant la connexion au site
 *
 * @author Baptiste Pesquet
 */
class ControleurConnexion extends Controleur
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

    public function connecter()
    {
        if ($this->requete->existeParametre("courriel") && $this->requete->existeParametre("mdp")) {
            $courriel = $this->requete->getParametre("courriel");
            $mdp = $this->requete->getParametre("mdp");
            if ($this->client->connecter($courriel, $mdp)) {
                $this->accueillirClient($courriel, $mdp);
            }
            else
                $this->genererVue(array('msgErreur' => 'Client inconnu'),
                        "index");
        }
        else
            throw new Exception("Action impossible : courriel ou mot de passe non défini");
    }

    public function deconnecter()
    {
        $this->requete->getSession()->detruire();
        $this->rediriger("accueil");
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

            $this->client->ajouterClient($nom, $prenom, $adresse, $codePostal,
                    $ville, $courriel, $mdp);
            $this->accueillirClient($courriel, $mdp);
        }
        else
            throw new Exception("Action impossible : tous les paramètres ne sont pas définis");
    }

    /**
     * Enregistre un client connecté dans la session et redirige vers la page d'accueil
     * 
     * @param type $courriel
     * @param type $mdp
     */
    private function accueillirClient($courriel, $mdp)
    {
        $client = $this->client->getClient($courriel, $mdp);
        $this->requete->getSession()->setAttribut("client", $client);
        $this->rediriger("accueil");
    }

}
