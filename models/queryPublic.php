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
class queryPublic extends superModel {


  public function __construct($table) {
    return $this->_table = $table;
  }

  public function getVideos($cat) {

    echo $cat;

  }

}
