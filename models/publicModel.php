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

  public function __construct($cat = NULL) {
    return $this->_cat = $cat;
  }

  public function getVideos($args = array()) {

    $sql = "SELECT * FROM videos";

    if($this->_cat) $sql .= " WHERE categorie = '$this->_cat'";
    //if(isset($args['limit'])) $sql .= " ORDER BY date LIMIT ".$args['limit'];
    if(isset($args['order'])) $sql .= " ORDER BY date ". $args['order'];

    $datas = $this->pdo()->query($sql);
    return $vids = $datas->fetchAll(PDO::FETCH_ASSOC);

  }

  public function getVideo($idVideo) {

    $sql = "SELECT * FROM videos WHERE categorie = '$this->_cat' AND id_video = '$idVideo'";

    $datas = $this->pdo()->query($sql);
    return $vids = $datas->fetch(PDO::FETCH_ASSOC);

  }

}
