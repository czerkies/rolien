<?php

class contentController extends superController {

  public function __construct($url) {
    $this->_url = $url;
  }

  public function videos() {

    $page = new superModel();

    // Récupération des données par cat.
    // Si une _url[1] est présente, lancer la fonction de récupération de cet article.

    $uve = NULL;

    if(isset($this->_url[0]) && !empty($this->_url[0])) {

      //$meta['title'] = 'Une vie en 16/9';

      if(isset($this->_url[1])) $datasVid = $page->metaDatas($this->_url[1]);

      if(isset($this->_url[1]) && $datasVid !== FALSE) {

        $datas['uve'] = $datasVid['description'];
        $meta['title'] = $datasVid['title'];

      } else {

        $datas['uve'] = "Liste du content";

      }

    }

    //$meta['title'] = '';
    //$meta['description'] = 'Test';
    //$meta['current_menu'] = '';
    //$meta['restriction'] = 0;

    $limit = 2;

    $word = new queryModel('test');
    $datas['hw'] = $word->read(
      [
        'column' => 'word',
        //'where' => "word = 'world'",
        /*'limit' => $limit,
        'orderby' => 'word',
        'order' => 'desc',*/
        //'format' => 'rows'
      ]
    );

    $meta = $meta ?? NULL;

    return [
      'datas' => $datas,
      'meta' => $meta
    ];

  }

  public function home() {

    $datas['text'] = 'Test';

    return [
      'datas' => $datas
    ];

  }

  public function aPropos() {

  }

}
