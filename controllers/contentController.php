<?php

class contentController extends superController {

  public function videos() {

    $meta['file_name'] = 'videos';
    //$meta['folder'] = 'content';

    //$page = new superModel();

    // Récupération des données par cat.
    // Si une _url[1] est présente, lancer la fonction de récupération de cet article.

    $uve = NULL;
    $vid = '';

    //$meta['title'] = 'Une vie en 16/9';
    $uve = "Liste du content";

    if(!empty($_GET['vid'])) {

      $vidDB = new queryModel('videos');
      $vid = $vidDB->read(
        [
          //'column' => 'word',
          'where' => "id_video = '".$_GET['vid']."' AND categorie = '".$_GET['cat']."'",
          /*'limit' => $limit,
          'orderby' => 'word',
          'order' => 'desc',*/
          'format' => 'row'
        ]
      );

      if($vid) {
        $meta['title'] = 'video : ' . $vid['title'];
        $meta['description'] = $vid['description'];
        $uve = "Video #" . $vid['title'] . " en cours";
      }

    }

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
      ['hw' => $hw, 'uve' => $uve, 'vid' => $vid]
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

  public function errorUrl() {

    $meta['file_name'] = 'errorUrl';

    $this->render($meta);

  }

}
