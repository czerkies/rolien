<?php

class contentController extends superController {



  public function videos() {

    $meta['file_name'] = 'videos';
    //$meta['folder'] = 'content';

    //$page = new superModel();

    // Récupération des données par cat.
    // Si une _url[1] est présente, lancer la fonction de récupération de cet article.

    $uve = NULL;

    //$meta['title'] = 'Une vie en 16/9';
    $uve = "Liste du content";

    if(!empty($_GET['current'])) {

      $meta['title'] = 'video : ' . $_GET['current'];
      $uve = "Video #" . $_GET['current'] . " en cours";

    }

    $limit = 2;

    $word = new queryModel('test');
    $hw = $word->read(
      [
        'column' => 'word',
        //'where' => "word = 'world'",
        /*'limit' => $limit,
        'orderby' => 'word',
        'order' => 'desc',*/
        //'format' => 'rows'
      ]
    );

    //$meta = $meta ?? NULL;
    //$meta['title'] = "Fonction";
    $meta['restriction'] = 0;

    $this->render(
      $meta,
      ['hw' => $hw, 'uve' => $uve]
    );

  }

  public function home() {

    $meta['file_name'] = 'home';

    $text = 'Test';

    $this->render(
      $meta,
      ['text' => $text]
    );

  }

  public function aPropos() {

    $meta['file_name'] = 'a-propos';

    $this->render($meta);

  }

  public function undefind() {

    $meta['file_name'] = 'undefind';

    $this->render($meta);

  }

}
