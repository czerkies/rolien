<h1><?php if(isset($hw)) foreach ($hw as $value) echo $value['word']; ?></h1>

Catégorie : <?= $_GET['cat']; ?>

<?php if($vid): ?>

  <p><?= $vid['description']; ?></p>

<?php endif; ?>

<?php if(isset($datas['test'])) echo $datas['test']; ?>

<?php echo "<pre>"; var_dump($vids); ?>
