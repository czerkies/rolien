<?php

/**
 * Class gérant l'affichage
 *
 * Rend et gère l'affichage de la page demandé via le routeur.
 *
 * @version Release: v1.0.0
 * @link http://romanczerkies.fr/
 * @since Class available since Release v1.0.0-alpha.1
 */
class superController {

  /**
  * Fonction permettant l'affichage dans le template.
  *
  * @param Array $fileView Chemin du fichier à afficher
  * @return
  */
  public function render($fileView = array(), $variables = array()) {

    $folder = $this->methodToFile($fileView[0]);
    $file = $this->methodToFile($fileView[1]);

    if(file_exists('../views/' . $folder . '/' . $file . '.php')) {

      extract($variables);

      ob_start();
      include('../views/' . $folder . '/' . $file . '.php');
      $buffer = ob_get_contents();
      ob_end_clean();

      include '../views/template.php';

    } else {

      $this->displayError(__CLASS__, __FUNCTION__, "Le dossier doit correspondre à votre 'Class' et votre Fichier doit correspondre à votre 'Function'.");

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

  public function displayError($class, $function, $explain = NULL) {

    $error = 'Erreur dans la fonction <b>' . $function . '</b> de la class <b>' . $class . '</b>.<br>';
    if($explain) $error .= 'Informations : ' . $explain;

    if(LOG) die($error);

  }

}
