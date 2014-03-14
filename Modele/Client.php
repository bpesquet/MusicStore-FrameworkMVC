<?php

require_once 'Framework/Modele.php';

/**
 * Services liés aux clients
 */
class Client extends Modele
{
    private $sql = "select CLI_ID as idClient, CLI_NOM as nom, CLI_PRENOM as prenom, CLI_ADRESSE as adresse,
            CLI_CP as codePostal, CLI_VILLE as ville, CLI_COURRIEL as courriel, CLI_MDP as motDePasse
            from T_CLIENT";

    /**
     * Vérifie q'un client existe dans la BD
     * 
     * @param type $courriel
     * @param type $mdp
     * @return type
     */
    public function connecter($courriel, $mdp)
    {
        $sql = "select CLI_ID from T_CLIENT where CLI_COURRIEL=? and CLI_MDP=?";
        $client = $this->executerRequete($sql, array($courriel, $mdp));
        return ($client->rowCount() == 1);
    }

    /**
     * Renvoie les infos sur un client
     * 
     * @param type $courriel
     * @param type $mdp
     * @return type
     * @throws Exception
     */
    public function getClient($courriel, $mdp)
    {
        $sql = $this->sql . " where CLI_COURRIEL=? and CLI_MDP=?";
        $client = $this->executerRequete($sql, array($courriel, $mdp));
        if ($client->rowCount() == 1)
            return $client->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucun client ne correspond aux identifiants fournis");
    }

    /**
     * Renvoie les infos sur un client
     * 
     * @param type $idClient
     * @return type
     * @throws Exception
     */
    public function getClientParId($idClient)
    {
        $sql = $this->sql . " where CLI_ID=?";
        $client = $this->executerRequete($sql, array($idClient));
        if ($client->rowCount() == 1)
            return $client->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucun client ne correspond 0 l4identifiqnt fourni");
    }

    /**
     * Ajoute un nouveau client
     * 
     * @param type $nom
     * @param type $prenom
     * @param type $adresse
     * @param type $codePostal
     * @param type $ville
     * @param type $courriel
     * @param type $mdp
     */
    public function ajouterClient($nom, $prenom, $adresse, $codePostal, $ville, $courriel, $mdp)
    {
        $sql = "insert into T_CLIENT(CLI_NOM, CLI_PRENOM, CLI_ADRESSE, CLI_CP, CLI_VILLE, CLI_COURRIEL, CLI_MDP)
            values (?, ?, ?, ?, ?, ?, ?)";
        $this->executerRequete($sql,
                array($nom, $prenom, $adresse, $codePostal, $ville, $courriel, $mdp));
    }

    /**
     * Modifie un client existant
     * 
     * @param type $idClient
     * @param type $nom
     * @param type $prenom
     * @param type $adresse
     * @param type $codePostal
     * @param type $ville
     * @param type $courriel
     * @param type $mdp
     */
    public function modifierClient($idClient, $nom, $prenom, $adresse, $codePostal, $ville, $courriel, $mdp)
    {
        $sql = "update T_CLIENT set CLI_NOM=?, CLI_PRENOM=?, CLI_ADRESSE=?, CLI_CP=?, 
            CLI_VILLE=?, CLI_COURRIEL=?, CLI_MDP=? where CLI_ID=?";
        $this->executerRequete($sql,
                array($nom, $prenom, $adresse, $codePostal, $ville, $courriel, $mdp, $idClient));
    }

}
