<?php

/**
* Fonction de connection à la base de données.
*
* @param $host (string), $dbname (string), $user (string), $mdp (string), $options (array).
*
* @return array();
*
**/
function connect() {

  $host = 'localhost'; // DSN
  $dbname = 'rolien'; // Nom de la base
  $user = 'root'; // Utilisateur
  $mdp = 'root'; // Mot de Passe

  $options = [ // Options
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8, lc_time_names = \'fr_FR\''
  ];

  return array(
    'DSN' => 'mysql:host='.$host.';dbname='.$dbname.';',
    'user' => $user,
    'mdp' => $mdp,
    'options' => $options
  );

}
