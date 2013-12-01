<?php

require_once 'ControleurPersonnalise.php';

abstract class ControleurSecurise extends ControleurPersonnalise
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