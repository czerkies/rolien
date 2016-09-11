<h1><?php if(isset($hw)) foreach ($hw as $value) echo $value['word']; ?></h1>

Catégorie : <?= $_GET['cat']; ?>

<?php if($uve): ?>

  <p><?= $uve; ?></p>

<?php endif; ?>

<?php if(isset($datas['test'])) echo $datas['test']; ?>

<?php var_dump($_GET); ?>
