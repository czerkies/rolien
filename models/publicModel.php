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

  public function search($keys) {

    echo microtime();

    $sql = "SELECT *, DATE_FORMAT(date, '%Y') AS YEAR FROM videos";// WHERE date LIKE '%" . $value['YEAR'] . "%'";

    //var_dump($keys);

    if(isset($keys) && !empty($keys)) {

      $sqlFinder = " WHERE ";
      $arrayFind = ['title', 'description', 'date'];
      foreach ($keys as $letters) {
        $sqlFinder .= " (";
        foreach ($arrayFind as $keyCol => $col) {
          if($keyCol > 0) $sqlFinder .= " OR ";
          $sqlFinder .= "$col LIKE '%$letters%'";
        }
        $sqlFinder .= ") AND ";
      }

      $sql .= rtrim($sqlFinder, ' AND ');

      //$sql .= " ORDER BY title";

    } else {

      //$sql .= " ORDER BY date DESC";

    }

    //$sql .= " ORDER BY YEAR";

    //echo $sql;

    //var_dump($value['YEAR']);
    $datas = $this->pdo()->query($sql);
    $vids = $datas->fetchAll(PDO::FETCH_ASSOC);

    if($vids) foreach ($vids as $keys => $val) $vidsByYear[$val['YEAR']][$val['title']] = $vids[$keys];
    else $vidsByYear = NULL;
    echo '<hr>' . microtime();
    //$vids[$val['YEAR']] = $datas->fetchAll(PDO::FETCH_ASSOC);

  //}

    return $vidsByYear;

  }

}
