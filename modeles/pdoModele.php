<?php

/**
 * Gestion de la connexion à la base de données
 *
 * Communique à toutes les autres class 'modele' la connexion à la base de données via PDO.
 *
 * @copyright 2016 Roman Czerkies
 * @version Release: v1.0.0
 * @link http://romanczerkies.fr/
 * @since Class available since Release v1.0.0-alpha.1
 */
class pdoModele {

  /**
  * Fonction de connection à la bdd.
  *
  * @return Object $pdo Instance de la connexion via PDO
  */
  public function pdo(){

    include_once '../conf/bdd.php';

    $donneesDB = connect();

    try {

      return $pdo = new PDO($donneesDB['DSN'], $donneesDB['user'], $donneesDB['mdp'], $donneesDB['options']);

    } catch(PDOException $e) {

      echo 'Connexion échouée : ' . $e->getMessage();

    }

  }

}
