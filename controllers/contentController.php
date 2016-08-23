<?php

class contentController extends superController {

  public function __construct($url) {
    $this->_url = $url;
  }

  public function videos() {

    // Récupération des données par cat.
    // Si une _url[1] est présente, lancer la fonction de récupération de cet article.

    if(isset($_GET['test'])) $datas['test'] = 'test';

    $uve = NULL;

    if(isset($this->_url[0]) && !empty($this->_url[0]) && $this->_url[0] === 'une-vie-en-169') {

      $meta['title'] = 'Une vie en 16/9';

      if(isset($this->_url[1]) && $this->_url[1] === '15') {

        $datas['uve'] = "Lecture en cours 15";
        $meta['title'] = "Une vie en 16/9 #15";

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
