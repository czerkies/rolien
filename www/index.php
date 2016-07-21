<?php

function autoloader($class){

  if(strpos($class, 'Controleur') !== FALSE){
    if(file_exists('../controleurs/'.$class.'.php')){
      include_once '../controleurs/'.$class.'.php';
    }
  }

  if(strpos($class, 'Modele') !== FALSE){
    if(file_exists('../modeles/'.$class.'.php')){
      include_once '../modeles/'.$class.'.php';
    }
  }

}

spl_autoload_register('autoloader');

if(isset($_GET['controleur']) && !empty($_GET['controleur'])
  && isset($_GET['method']) && !empty($_GET['method'])){

    $controleur = htmlentities($_GET['controleur']);
    $method = htmlentities($_GET['method']);

    if(file_exists('../controleurs/'.$controleur.'Controleur.php')) {
      include('../controleurs/'.$controleur.'Controleur.php');
        if(method_exists($controleur.'Controleur', $method)) {
          $classe = $controleur.'Controleur';
          $instance = new $classe();
          $instance->$method();

        }

    }

}
