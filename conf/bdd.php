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
    'DSN' => 'mysql:host='.HOST.';dbname='.DBNAME.';',
    'user' => USER,
    'mdp' => MDP,
    'options' => $options
  );

}
