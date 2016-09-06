<?php

/**
 * Class gérant l'affichage
 *
 * Rend et gère l'affichage de la page demandé via le routeur.
 *
 * @version v11.0.0
 * @link http://romanczerkies.fr/
 * @since v11.0.0-alpha.1
 */
class superController {

  /**
  * Fonction permettant l'affichage dans le template.
  *
  * @param Array $meta Chemin du fichier à afficher
  * @return
  */
  public function render($meta = array(), $datas = array()) {

    session_start();

    $page = new superModel();
    $metaDB = $page->metaDatas($meta['file_name']);

    /*echo "<pre>";
    var_dump($meta);
    echo "<hr>";
    var_dump($metaDB);*/

    if($metaDB) foreach($metaDB as $key => $value) if(!isset($meta[$key])) $meta[$key] = $metaDB[$key];

    $userStatus = $_SESSION['membre']['status'] ?? 0;
    if(isset($meta['restriction']) && $meta['restriction'] > $userStatus) $meta = $page->metaDatas('restriction');
    if(!file_exists('../views/' . $meta['folder'] . '/' . $meta['file_name'] . '.php')) $meta = $page->metaDatas('undefind');
    if(isset($datas)) extract($datas);

  //if(file_exists('../views/' . $meta['folder'] . '/' . $meta['file_name'] . '.php')) {

      ob_start();

      /*if(isset($meta['restriction']) && $meta['restriction'] > $userStatus) {

        $meta['title'] = 'Page non autorisé';
        $meta['description'] = 'Page non autorisé';
        include '../views/errors/restriction.php';

      } else {*/

        include '../views/' . $meta['folder'] . '/' . $meta['file_name'] . '.php';

      //}
      $buffer = ob_get_contents();
      ob_end_clean();

      include '../views/template.php';

  //  } else {
    //  $this->displayError(__CLASS__, __FUNCTION__, "Le fichier est introuvable.");
    //}



  }

  /**
  * Fonction permettant l'affichage dans le template.
  *
  * @param Array $meta Chemin du fichier à afficher
  * @return
  */
  /*public function dispatch() {

    $url = explode('/', trim($_GET['url'], '/'));

    $content = new contentController($url);
    $datas = new superModel();

    $meta = $datas->metaDatas($url[0]);

    if(empty($meta['folder']) || empty($meta['file_name'])) $meta = $datas->contentErrors('400');

    $userStatus = $_SESSION['membre']['status'] ?? 0;

    if(isset($meta['restriction']) && $meta['restriction'] > $userStatus) $meta = $datas->contentErrors('restriction');

    if(isset($meta['function']) && method_exists('contentController', $meta['function']) === TRUE) {
      $datasContent = $content->{$meta['function']}();
    }

    $metaPage = $datasContent['meta'] ?? NULL;
    $meta = $datasContent['datas'] ?? NULL;

    foreach ($meta as $key => $value) if(!isset($metaPage[$key])) $metaPage[$key] = $value;

    $this->render(
      [$meta['folder'], $meta['file_name']],
      $metaPage,
      $meta
    );

  }

  /*public function methodToFile($value) {

    $file = '';

    foreach (preg_split('/(?=[A-Z])/', $value) as $key => $value) {

      if($value != 'Controller') {

        if($key) $file .= '-';
        $file .= strtolower($value);

      }

    }

    return $file;

  }*/

  /**
  * Method permettant d'afficher une erreur survenue lors de son appel dans le framework.
  * Peut-être désactivé dans le 'param.php' en passant la valeur 'LOG' à 'FALSE'.
  *
  * @param String $class Récupère le nom de la class.
  * @param String $function Récupère le nom de la method.
  * @param String $explain Text d'explication de l'erreur.
  * @return String $error (echo)
  */
  public function displayError($class = NULL, $function = NULL, $explain = NULL) {

    $error = '';

    if($class !== NULL || $function !== NULL) $error .= 'Erreur dans la method <b>' . $function . '</b> de la class <b>' . $class . '</b>.<br>';
    if($explain) $error .= 'Informations : ' . $explain;

    $error .= '<hr>';

    if(LOG) echo $error;

  }

}
