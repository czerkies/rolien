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
class queryModel extends connectModel {

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
  public function selectDB($rows = NULL, $conditions = NULL, $format = NULL) {

    $sql = "SELECT ";
    $sql .= ($rows) ? $rows." " : "* ";
    $sql .= "FROM " . $this->table;

    if(isset($conditions['where'])) $sql .= " WHERE ".$conditions['where'];

    if(isset($conditions['orderby']) && !empty($conditions['orderby'])) {

      $sql .= " ORDER BY ".$conditions['orderby'];

      if(isset($conditions['order'])) {

        $order = strtoupper($conditions['order']);

        if($order === 'DESC' || $order === 'ASC') $sql .= " ".$order;
        else $this->displayError(__CLASS__, __FUNCTION__, "'order' doit être égal à 'DESC' ou 'ASC'.");

      }

    }

    if(!isset($conditions['limit']) || (isset($conditions['limit']) && is_numeric($conditions['limit']))) $sql .= " LIMIT ".$conditions['limit'];
    else $this->displayError(__CLASS__, __FUNCTION__, "'limit' doit être un chiffre entier.");

    echo $sql.'<br>';

    $datas = $this->pdo()->query($sql);

    // Format de récupération des données.

    if($format === NULL || empty($format) || $format === 'rows') $datasFormat = $datas->fetchAll(PDO::FETCH_ASSOC);
    elseif($format === 'oneRow') $datasFormat = $datas->fetch(PDO::FETCH_ASSOC);
    elseif($format === 'nbRows') $datasFormat = $datas->rowCount();
    else $this->displayError(__CLASS__, __FUNCTION__, "Le format demandé doit être égal à 'oneRow', 'nbRows' ou NULL.");

    return $datasFormat;

  }

}
