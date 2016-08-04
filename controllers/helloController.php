<?php

class helloController extends superController {

  public function worldTest() {

    //$meta['title'] = '';
    //$meta['description'] = 'Test';
    //$meta['current_menu'] = '';
    //$meta['restriction'] = 0;

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

    $this->render(
      [__CLASS__, __FUNCTION__],
      $meta ?? NULL,
      ['hw' => $hw]
    );

  }

}
