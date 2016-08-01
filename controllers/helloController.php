<?php

class helloController extends superController {

  public function worldTest() {

    //$meta['title'] = 'Hello Word';
    $meta['description'] = 'Test';
    $meta['current_menu'] = '';

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

    var_dump($hw);
    echo "<hr>";

    $this->render(
      [__CLASS__, __FUNCTION__],
      ['hw' => $hw, 'meta' => $meta]
    );

  }

  public function page() {

    if(isset($_GET['page'])) {

      $limit = 5;

      $datas = new queryModel('pages');
      $meta = $datas->read(
        [
          'where' => 'file_name = "' . $_GET['page'] . '"',
          'format' => 'oneRow'
        ]
      );

      var_dump($meta);
      echo "<hr>";

      $this->render(
        [__CLASS__, $meta['file_name']],
        ['meta' => $meta]
      );

    }

  }

}
