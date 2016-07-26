<?php

class helloController extends renderController {

  function world() {

    $fileView['FOLDER'] = 'hello';
    $fileView['FILE'] = 'world';

    $limit = '5';

    $word = new queryModel('test');
    $hw = $word->selectDB(
      'word',
      array(
        //'where' => "word = 'hello'",
        //'limit' => $limit,
        //'orderby' => 'word',
        'order' => 'desc'
      ),
      'rows'
    );

    var_dump($hw);
    echo "<hr>";

    $this->render(
      $fileView,
      array('hw' => $hw)
    );

  }

}
