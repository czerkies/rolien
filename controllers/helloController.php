<?php

class helloController extends superController {

  public function worldTest() {

    //$meta['title'] = 'Titre tout neuf imposé';
    //$meta['description'] = 'Test';
    //$meta['current_menu'] = '';

    $limit = 5;

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

    /*var_dump($hw);
    echo "<hr>";*/

    $this->render(
      [__CLASS__, __FUNCTION__],
    ['hw' => $hw]//'meta' => $meta]
    );

  }

}
