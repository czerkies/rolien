<?php

class superController {

  public function displayError($class, $function, $explain = NULL) {

    $error = 'Erreur dans la fonction <b>' . $function . '</b> de la class <b>' . $class . '</b>.<br>';
    if($explain) $error .= 'Informations : ' . $explain;

    die($error);

  }

}
