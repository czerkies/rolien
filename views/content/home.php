Je suis la page d'accueil.

<form action="" method="POST">
  <input type="search" name="s" value="<?php if(isset($_POST['s'])) echo htmlentities($_POST['s']); ?>" autofocus>
  <button type="button" name="button">search</button>
</form>

<?php

echo "<pre>";

var_dump($_GET);

echo "<hr>";

//if(isset($vids)) var_dump($vids);

if(isset($vids)):
  foreach ($vids as $value): ?>
    Video : <b><?= $value['title']; ?></b>.<hr>
  <?php endforeach;
endif; ?>
