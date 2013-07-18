<?php

/**
 * Classe de gestion des paramètres de configuration
 * 
 * Inspirée du SimpleFramework de F. Guillot
 * (https://github.com/fguillot/simpleFramework)
 *
 * @author Baptiste Pesquet
 */
class Configuration {

    private static $parametres;

    public static function get($nom, $valeurParDefaut = null) {
        if (isset(self::getParametres()[$nom])) {
            $valeur = self::getParametres()[$nom];
        }
        else {
            $valeur = $valeurParDefaut;
        }
        return $valeur;
    }

    private static function getParametres() {
        if (self::$parametres == null) {
            $cheminFichier = "Config/prod.ini";
            if (!file_exists($cheminFichier)) {
                $cheminFichier = "Config/dev.ini";
            }
            if (!file_exists($cheminFichier)) {
                throw new Exception("Erreur interne : aucun fichier de configuration trouvé");
            }
            else {
                self::$parametres = parse_ini_file($cheminFichier);
            }
        }
        return self::$parametres;
    }

}

