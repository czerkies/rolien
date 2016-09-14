<?php

/**
 * Gestion des requêtes basiques.
 *
 * 4 Method CRUD basique. La classe est instancié avec pour argument le nom de la 'table'.
 *
 * @version v11.0.0
 * @link http://romanczerkies.fr/
 * @since v11.0.0-alpha.1
 */
class queryModel extends superModel {

  private $table;

  public function __construct($table) {
    $this->table = $table;
  }

  /**
  * Requête 'SELECT'
  *
  * @param Array $conditions
  * 'column' => Collonne à retourner.
  * 'where' => Trie des valeurs à récupérer.
  * 'orderby' => Classement des données.
  * 'order' => Classment croissant ou décroissant. ('DESC', 'ASC')
  * 'limit' => Nombre de requete à récupérer.
  * 'format' => Type de récupération des donnéees PDO ('rows', 'oneRow', 'nbRows')
  * @return Object $pdo Instance de la connexion via PDO
  */
  public function read($conditions = NULL) {

    $sql = "SELECT ";

    if(isset($conditions['column']) && !empty($conditions['column'])) {

      if(is_string($conditions['column'])) $sql .= $conditions['column'] . " ";

    } else {

      $sql .= "* ";

    }

    $sql .= "FROM " . $this->table;

    if(isset($conditions['where'])) {

      if(is_string($conditions['where']) && strlen($conditions['where']) > 4) $sql .= " WHERE ".$conditions['where'];
      else $this->displayError(__CLASS__, __FUNCTION__, "'where' doit être au format 'string'.");

    }

    // Vérification orderby
    if(isset($conditions['orderby']) && !empty($conditions['orderby'])) {

      $sql .= " ORDER BY ".$conditions['orderby'];

      if(isset($conditions['order'])) {

        $order = strtoupper($conditions['order']);

        if($order === 'DESC' || $order === 'ASC') $sql .= " ".$order;
        else $this->displayError(__CLASS__, __FUNCTION__, "'order' doit être égal à 'DESC' ou 'ASC'.");

      }

    }

    // Vérification limit
    if(isset($conditions['limit'])) {

      if(is_numeric($conditions['limit']) && $conditions['limit'] >= 0) $sql .= " LIMIT ".$conditions['limit'];
      else $this->displayError(__CLASS__, __FUNCTION__, "'limit' doit être un chiffre entier.");

    }

    $datas = $this->pdo()->query($sql);

    if($datas) {

      // Format de récupération des données.
      if(!isset($conditions['format']) || $conditions['format'] === 'rows') $datasFormat = $datas->fetchAll(PDO::FETCH_ASSOC);
      elseif($conditions['format'] === 'row') $datasFormat = $datas->fetch(PDO::FETCH_ASSOC);
      elseif($conditions['format'] === 'nbRows') $datasFormat = $datas->rowCount();
      else $this->displayError(__CLASS__, __FUNCTION__, "Le format demandé doit être égal à 'oneRow', 'nbRows' ou NULL.");

      return $datasFormat;

    } else {

      $this->displayError(__CLASS__, __FUNCTION__, 'Erreur dans votre requete.');

    }

  }

}
