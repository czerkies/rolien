<div class="home">
  <p>Productions ROLIEN</p>
</div>

<form action="" method="post">
  <input type="search" name="s" onkeyup="submit()" value="<?php if(isset($_POST['s'])) echo htmlentities($_POST['s']); ?>" autocomplete="off">
  <button type="button" name="button">search</button>
</form>
<hr>
<?php

//if(isset($vids)) echo '<pre>'; var_dump($vids); echo '</pre>';

if(isset($vids)):

  foreach ($vids as $key => $datas):

    echo $key;

    foreach ($datas as $value): ?>

      <div class="search" id="<?= $value['title'] . ' ' . $value['description']; ?>">Video : <b><?= $value['title']; ?></b>.(<?= $value['YEAR']; ?>)<hr></div>

  <?php endforeach;

  endforeach;

endif; ?>


<script type="text/javascript">
  function submit() {
    //document.querySelectorAll('button[type=button]').submit;
    console.log('Tu cherches quoi ?');
  }

  function node(arg, display) {

    for(var i=0; i < 3; i++) {
      console.log(arg[i]);
      arg[i].style.display=display;
    }

  }

  /*function search(key) {

    var hide = document.querySelectorAll('.search');

    if(key != '') {

      var show = document.querySelectorAll('.search[id*="' + key + '"]');

      node(hide, 'none');
      node(show, 'block');

    } else {

      node(hide, 'block');

    }

  }*/
</script>
