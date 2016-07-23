<?php

class helloController extends renderController {

  function world() {

    $fileView['FOLDER'] = 'hello';
    $fileView['FILE'] = 'world';

    $hw = array('Hello', ' ', 'World', '.');

    $this->render(
      $fileView,
      array('hw' => $hw)
    );

  }

}
