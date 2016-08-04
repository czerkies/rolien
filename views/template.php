<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title><?php if(isset($meta['title'])) echo $meta['title']; ?></title>
    <meta name="description" content="<?php if(isset($meta['description'])) echo $meta['description']; ?>">
    <link rel="stylesheet" type="text/css" href="<?= RACINE; ?>css/style.css">
  </head>
  <body>
    <?= $buffer; ?>
  </body>
</html>
