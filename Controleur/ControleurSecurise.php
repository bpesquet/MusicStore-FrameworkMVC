<?php

require_once 'ControleurSite.php';

abstract class ControleurSecurise extends ControleurSite
{

    public function executerAction($action)
    {
        if ($this->requete->getSession()->existeAttribut("client")) {
            parent::executerAction($action);
        }
        else {
            $this->rediriger("connexion");
        }
    }

}