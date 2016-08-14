<?php

class contentController extends superController {

  public function __construct($url) {
    $this->_url = $url;
  }

  public function videos() {

    $uve = NULL;

    echo "<pre>";
    var_dump($this->_url);
    echo "</pre>";

    if(isset($this->_url[0]) && !empty($this->_url[0])) {

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

    $limit = 5;

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
    /*$this->render(
      [__CLASS__, __FUNCTION__],
      $meta ?? NULL,
      ['hw' => $hw, 'uve' => $uve]
    );*/

  }

  public function home() {

    $vars['text'] = 'Test';

    return $vars;

  }

  public function aPropos() {

    $this->render(
      [__CLASS__, __FUNCTION__],
      $meta ?? NULL,
      []
    );

  }

}
