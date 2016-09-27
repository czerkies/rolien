Je suis la page d'accueil.

<?php

echo "<pre>";

var_dump($text);

echo "<hr>";

//if(isset($vids)) var_dump($vids);

if(isset($vids)):
  foreach ($vids as $value): ?>
    Video : <b><?= $value['title']; ?></b>.<hr>
  <?php endforeach;
endif; ?>
