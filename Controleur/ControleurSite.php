<?php

require_once 'Framework/Controleur.php';

abstract class ControleurSite extends Controleur
{

    protected function genererVue($donneesVue = array(), $action = null)
    {
        $client = null;
        if ($this->requete->getSession()->existeAttribut("client")) {
            $client = $this->requete->getSession()->getAttribut("client");
        }
        parent::genererVue($donneesVue + array('client' => $client), $action);
    }

}