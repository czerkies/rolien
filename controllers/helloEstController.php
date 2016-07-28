<?php

class helloEstController extends renderController {

  function worldTest() {

    $limit = '5';

    $word = new queryModel('test');
    $hw = $word->selectDB(
      array(
        'column' => 'word',
        /*'where' => "word = 'hello'",
        'limit' => $limit,
        'orderby' => 'word',
        'order' => 'desc',
        'format' => 'rows'*/
      )
    );

    var_dump($hw);
    echo "<hr>";

    $this->render(
      array(__CLASS__, __FUNCTION__),
      array('hw' => $hw)
    );

  }

}
