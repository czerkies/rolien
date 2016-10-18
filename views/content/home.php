Je suis la page d'accueil.

<form action="#" method="" onsubmit="return:false;">
  <input type="search" name="s" onkeyup="search(this.value)" value="<?php if(isset($_POST['s'])) echo htmlentities($_POST['s']); ?>" autocomplete="off">
  <button type="button" name="button">search</button>
</form>
<hr>
<?php

//if(isset($vids)) var_dump($vids);

if(isset($vids)):
  foreach ($vids as $value): ?>
    <div class="search" id="<?= $value['title'] . ' ' . $value['description']; ?>">Video : <b><?= $value['title']; ?></b>.(<?= $value['date']; ?>)<hr></div>
  <?php endforeach;
endif; ?>


<script type="text/javascript">
  function node(arg, display) {

    for(var i=0; i < 3; i++) {
      console.log(arg[i]);
      arg[i].style.display=display;
    }

  }

  function search(key) {

    var hide = document.querySelectorAll('.search');

    if(key != '') {

      var show = document.querySelectorAll('.search[id*="' + key + '"]');
      /*for(var i=0; i < 3; i++) {
        console.log(hide[i]);
        hide[i].style.display="none";
      }
      for(var i=0; i < 3; i++) {
        console.log(show[i]);
        show[i].style.display="block";
      }*/

      node(hide, 'none');
      node(show, 'block');

    } else {

      node(hide, 'block');

    }

  }
</script>
