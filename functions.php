<?php

if($_POST['devis']){

  if(isset($_POST['surface'])){

    if(!empty($_POST['surface']) && is_numeric($_POST['surface'])
    && $_POST['surface'] >= 1 && $_POST['surface'] < 9999){

      $total = 0;

      switch ($_POST['surface']) {
        case 5:
        $total += 4000;
        break;

        case 10:
        $total += 10000;
        break;

        default:
        $total += 1000;
        break;
      }

      if(isset($_POST['option_lumiere'])) $total += 250;

    }

  } else {
    $total = 'une erreur est survenue';
  }
}

var_dump($_POST);
