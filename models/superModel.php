<?php

/**
 * Gestion de la connexion à la base de données
 *
 * Communique à toutes les autres class 'modele' la connexion à la base de données via PDO.
 *
 * @version v11.0.0
 * @link http://romanczerkies.fr/
 * @since v11.0.0-alpha.1
 */
class superModel extends superController {

  /**
  * Fonction de connection à la bdd prenant compte les parametres de param.php
  *
  * @param
  * @return Object $pdo Instance de la connexion via PDO
  */
  public function pdo() {

    $options = [ // Options
      PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
      PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8, lc_time_names = \'fr_FR\''
    ];

    $donneesDB = [
      'DSN' => 'mysql:host=' . PARAM_DB[0] . ';dbname=' . PARAM_DB[1] . ';',
      'user' => PARAM_DB[2],
      'mdp' => PARAM_DB[3],
      'options' => $options
    ];

    try {

      return $pdo = new PDO($donneesDB['DSN'], $donneesDB['user'], $donneesDB['mdp'], $donneesDB['options']);

    } catch(PDOException $e) {

      $this->displayError(__CLASS__, __FUNCTION__, 'Connexion échouée : ' . $e->getMessage());

    }

  }

  public function metaDatas($file_name) {

    if(is_string($file_name) && !empty($file_name)) {

      $sql = "SELECT file_name, folder, title, description, restriction FROM pages WHERE file_name = '$file_name'";
      $datas = $this->pdo()->query($sql);

      return $datasPage = $datas->fetch(PDO::FETCH_ASSOC);

    } else {

      $this->displayError(__CLASS__, __FUNCTION__, "'file_name' non valide.");

    }

  }

}
