<?php

/**
*
* Parametres du framework.
*
*/

// Parametres pour la connection à la base de donnéees.
define('PARAM_DB',[
  'localhost', //DSN
  'rolien', // Nom de la base
  'root', // Utilisateur
  'root' // Mot de passe
]);

// Définition de la racine du site
define('RACINE', '/rolien/www/');
define('RACINE_SERVER', $_SERVER['DOCUMENT_ROOT']);

// Affichage des erreurs
define('LOG', TRUE);
