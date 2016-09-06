<?php

// Import des parametres
include_once '../conf/param.php';

// Fonction AutoLoad
function autoloader($class) {

  if(strpos($class, 'Controller') !== FALSE) {
    if(file_exists('../controllers/'.$class.'.php')) {
      include_once '../controllers/'.$class.'.php';
    }
  }

  if(strpos($class, 'Model') !== FALSE) {
    if(file_exists('../models/'.$class.'.php')) {
      include_once '../models/'.$class.'.php';
    }
  }

}
spl_autoload_register('autoloader');

// Vérification existance $_GET
$controller = (isset($_GET['controller']) && !empty($_GET['controller'])) ? htmlentities($_GET['controller']) : 'content';
$method = (isset($_GET['method']) && !empty($_GET['method'])) ? htmlentities($_GET['method']) : 'home';

// Si fichier ou method non existante assignation erreur 400.
if(!file_exists('../controllers/'.$controller.'Controller.php')
|| !method_exists($controller . 'Controller', $method)) {

  $controller = 'content';
  $method = 'undefind';

}

// Chargement de la method.
$class = $controller.'Controller';
$instance = new $class();
$instance->$method();
