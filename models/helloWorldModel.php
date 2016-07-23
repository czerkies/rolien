<?php

/**
 * Titre
 *
 * Description
 *
 * @version Release: v1.0.0
 * @link http://romanczerkies.fr/
 * @since Class available since Release v1.0.0-alpha.1
 */
class helloWorldModel extends connectModel {

  public function __construct($table) {
    $this->table = $table;
  }

  /**
  * Affichage Test
  *
  * @param
  * @return Object $pdo Instance de la connexion via PDO
  */
  public function loadFromDB($rows = NULL) {

    $sql = "SELECT ";
    $sql .= ($rows) ? $rows." " : "* ";
    $sql .= "FROM " . $this->table;

    $donnees = $this->pdo()->query($sql);

    return $word = $donnees->fetchAll(PDO::FETCH_ASSOC);

  }

}
