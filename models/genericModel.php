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
class genericModel extends connectModel {

  private $table;

  public function __construct($table) {
    $this->table = $table;
  }

  /**
  * Affichage Test
  *
  * @param
  * @return Object $pdo Instance de la connexion via PDO
  */
  public function selectDB($rows = NULL, $conditions = NULL) {

    $sql = "SELECT ";
    $sql .= ($rows) ? $rows." " : "* ";
    $sql .= "FROM " . $this->table;

    if(isset($conditions['where'])) $sql .= " WHERE ".$conditions['where'];

    if(isset($conditions['orderby']) && !empty($conditions['orderby'])) {

      $sql .= " ORDER BY ".$conditions['orderby'];

      if(isset($conditions['order'])) {

        $order = strtoupper($conditions['order']);

        if($order === 'DESC' || $order === 'ASC') $sql .= " ".$order;

      }

    }

    if(isset($conditions['limit'])) $sql .= " LIMIT ".$conditions['limit'];

    echo $sql.'<br>';

    $donnees = $this->pdo()->query($sql);

    return $word = $donnees->fetchAll(PDO::FETCH_ASSOC);

  }

}
