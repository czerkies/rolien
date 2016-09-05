<?php

include_once '../conf/param.php';

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

/*function erreurUrl(){

  include('../controllers/contentController.php');
  $instance = new contentController();
  $instance->home();

}*/

$controller = (isset($_GET['controller']) && !empty($_GET['controller'])) ? htmlentities($_GET['controller']) : 'content';
$method = (isset($_GET['method']) && !empty($_GET['method'])) ? htmlentities($_GET['method']) : 'home';

/*if(isset($_GET['controller']) && !empty($_GET['controller'])
  && isset($_GET['method']) && !empty($_GET['method'])) {

    $controller = htmlentities($_GET['controller']);
    $method = htmlentities($_GET['method']);*/

/*    if(file_exists('../controllers/'.$controller.'Controller.php')) {
      //include('../controllers/'.$controller.'Controller.php');
        if(method_exists($controller.'Controller', $method)) {
          /*$classe = $controller.'Controller';
          $instance = new $classe();
          $instance->$method();*/
      //  }/* else {

        /*  erreurUrl();

        }*/

    //} /*else {

      /*erreurUrl();

    }*/

/*} else {

  include('../controllers/contentController.php');
  $instance = new contentController();
  $instance->home();

}*/

$classe = $controller.'Controller';
$instance = new $classe();
$instance->$method();
