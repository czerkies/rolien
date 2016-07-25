<?php

class helloController extends renderController {

  function world() {

    $fileView['FOLDER'] = 'hello';
    $fileView['FILE'] = 'world';

    $limit = 4;

    $word = new genericModel('test');
    $hw = $word->loadFromDB('word', array(
      'limit' => $limit,
      'orderby' => 'word',
      'order' => 'desc',
    ));

    $this->render(
      $fileView,
      array('hw' => $hw)
    );

  }

}
