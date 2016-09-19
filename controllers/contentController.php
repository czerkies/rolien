<?php

class contentController extends superController {

  public function videos() {

    $meta['file_name'] = 'videos';

    $vidByCat = new publicModel($_GET['cat']);
    $vids = $vidByCat->getVideosCat();

    $uve = NULL;
    $vid = '';

    $uve = "Liste du content";

    if(!empty($_GET['vid'])) {

      $vid = $vidByCat->getVideo($_GET['vid']);

      if($vid) {
        $meta['title'] = 'video : ' . $vid['title'];
        $meta['description'] = $vid['description'];
        $uve = "Video #" . $vid['title'] . " en cours";
      } else {
        $meta = $vidByCat->metaDatas('errorUrl');
      }

    }

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

    $meta['restriction'] = 0;

    $this->render(
      $meta,
      ['hw' => $hw, 'uve' => $uve, 'vids' => $vids, 'vid' => $vid]
    );

  }

  public function home() {

    $meta['file_name'] = 'home';

    $text = 'Test';

    $this->render(
      $meta,
      ['text' => $text]
    );

  }

  public function aPropos() {

    $meta['file_name'] = 'a-propos';

    $this->render($meta);

  }

  public function errorUrl() {

    $meta['file_name'] = 'errorUrl';

    $this->render($meta);

  }

}
