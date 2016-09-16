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
class publicModel extends superModel {

  public function __construct($cat) {
    return $this->_cat = $cat;
  }

  public function getVideosCat() {

    $sql = "SELECT * FROM videos WHERE categorie = '$this->_cat'";

    $datas = $this->pdo()->query($sql);
    return $vids = $datas->fetchAll(PDO::FETCH_ASSOC);

  }

  public function getVideo($idVideo) {

    $sql = "SELECT * FROM videos WHERE categorie = '$this->_cat' AND id_video = '$idVideo'";

    $datas = $this->pdo()->query($sql);
    return $vids = $datas->fetch(PDO::FETCH_ASSOC);

  }

}
