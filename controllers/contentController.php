<?php

class contentController extends superController {

  public function videos() {

    $uve = NULL;

    if(isset($_GET['uve'])) {

      if($_GET['uve'] === 'une-vie-en-169-15') {

        $uve = "Lecture en cours 15";
        $meta['title'] = "Une vie en 16/9 #15";

      }

    }

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
      ['hw' => $hw, 'uve' => $uve]
    );

  }

}
