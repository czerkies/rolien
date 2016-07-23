<?php

class helloController extends renderController {

  function world() {

    $fileView['FOLDER'] = 'hello';
    $fileView['FILE'] = 'world';

    $word = new helloWorldModel('test');
    $hw = $word->loadFromDB('word');

    $this->render(
      $fileView,
      array('hw' => $hw)
    );

  }

}
