<?php

include_once 'param.php';

/**
 * Fonction de connection à la base de données.
 *
 * @param
 *
 * @throws
 * @author Czerkies
 * @return Array Valeurs utilisés pour se connecter à la base de données.
 */
function connect() {

  $options = [ // Options
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8, lc_time_names = \'fr_FR\''
  ];

  return array(
    'DSN' => 'mysql:host=' . PARAM_DB[0] . ';dbname=' . PARAM_DB[1] . ';',
    'user' => PARAM_DB[2],
    'mdp' => PARAM_DB[3],
    'options' => $options
  );

}
