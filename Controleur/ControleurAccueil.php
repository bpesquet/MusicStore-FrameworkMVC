<?php

require_once 'Framework/Controleur.php';

/*
 * 
 */

class ControleurAccueil extends Controleur {

    public function index() {
        $data["Nom"] = "Baptiste";
        
        $this->genererVue(array('nom' => "Baptiste"));
    }

    public function test() {
        $this->genererVue();
    }
    
}
