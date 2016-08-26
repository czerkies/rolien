<?php
function autoloader($class) {

  if(strpos($class, 'Controller') !== FALSE){
    if(file_exists('../controllers/'.$class.'.php')){
      include_once '../controllers/'.$class.'.php';
    }
  }

  if(strpos($class, 'Model') !== FALSE){
    if(file_exists('../models/'.$class.'.php')){
      include_once '../models/'.$class.'.php';
    }
  }

}

spl_autoload_register('autoloader');

if(isset($_GET['url']) && !empty($_GET['url'])) {

  include('../controllers/superController.php');
  $instance = new superController();
  $instance->dispatch();

}

/*if(isset($_GET['controller']) && !empty($_GET['controller'])
  && isset($_GET['method']) && !empty($_GET['method'])) {

    $controller = htmlentities($_GET['controller']);
    $method = htmlentities($_GET['method']);

    if(file_exists('../controllers/'.$controller.'Controller.php')) {
      include('../controllers/'.$controller.'Controller.php');
        if(method_exists($controller.'Controller', $method)) {
          $classe = $controller.'Controller';
          $instance = new $classe();
          $instance->$method();

        }

    }

  }/* else {

    include('../controllers/contentController.php');
    $instance = new contentController();
    $instance->home();

  }*/
