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
  * @param Array $fileView Chemin du fichier à afficher
  * @return
  */
  public function render($fileView = array(), $meta = NULL, $vars = array()) {

    //session_start();

    $folder = $this->methodToFile($fileView[0]);
    $file = $this->methodToFile($fileView[1]);

    $datas = new superModel;
    $meta = $datas->metaDatas($file, $meta ?? NULL);

    $userStatus = $_SESSION['membre']['status'] ?? 0;

    extract($vars);

    if(file_exists('../views/' . $folder . '/' . $file . '.php')) {

      ob_start();

      if(isset($meta['restriction']) && $meta['restriction'] > $userStatus) {

        $meta['title'] = 'Page non autorisé';
        $meta['description'] = 'Page non autorisé';
        include '../views/errors/restriction.php';

      } else {

        include '../views/' . $folder . '/' . $file . '.php';

      }
      $buffer = ob_get_contents();
      ob_end_clean();

      include '../views/template.php';

    } else {

      $this->displayError(__CLASS__, __FUNCTION__, "Le dossier doit correspondre à votre 'Class' et votre Fichier doit correspondre à votre 'Function'.");

    }

  }

  public function dispatch() {

    if(isset($_GET['url']) && !empty($_GET['url'])) {

      $url = explode('/', trim($_GET['url'], '/'));

      $content = new contentController($url);
      $datas = new superModel();

      $meta = $datas->metaDatas($url[0]);

      if($meta) {

        $vars = $content->{$meta['function']}();

      } else {

        $meta = $datas->metaDatas('home');
        $vars = $content->home();

      }

      $this->render(
        ['content', $meta['file_name']],
        $meta = $vars['meta'],
        $vars = $vars['datas']
      );

    }

  }

  public function methodToFile($value) {

    $file = '';

    foreach (preg_split('/(?=[A-Z])/', $value) as $key => $value) {

      if($value != 'Controller') {

        if($key) $file .= '-';
        $file .= strtolower($value);

      }

    }

    return $file;

  }

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
