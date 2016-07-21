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
class renderControleur {

  /**
  * Fonction permettant l'affichage dans le template.
  *
  * @param Array $fileView Chemin du fichier à afficher
  * @return
  */
  public function render($fileView = array(), $variables = array()) {

    // Définition de la racine du site
    define('RACINE_SITE', '/rolien/www/');
    define('RACINE_SERVER', $_SERVER['DOCUMENT_ROOT']);

    if(is_string($fileView['FOLDER']) && strpos($fileView['FOLDER'], '/') === FALSE
    && is_string($fileView['FILE']) && strpos($fileView['FILE'], '.php') === FALSE) {

      extract($variables);

      ob_start();
      include('../views/'.$fileView['FOLDER'].'/'.$fileView['FILE'].'.php');
      $buffer = ob_get_contents();
      ob_end_clean();

      include '../views/template.php';

    }

  }

}
