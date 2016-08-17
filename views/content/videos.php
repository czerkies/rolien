<h1><?php foreach ($hw as $value) echo $value['word']; ?></h1>

<?php if($uve): ?>

  <p><?= $uve; ?></p>

<?php endif; ?>

<?php if(isset($datas['test'])) echo $datas['test']; ?>
