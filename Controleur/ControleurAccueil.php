<?php

require_once 'Framework/Controleur.php';

/*
 * 
 */

class ControleurAccueil extends Controleur {

    public function index() {
        $data["nom"] = "Baptiste";

        //$this->genererVue(array('nom' => "Baptiste"));
        $this->genererVue($data);
    }

    public function test() {
        $this->genererVue();
    }
}
