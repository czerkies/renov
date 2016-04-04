<?php

session_start();

define('PRIX_ETAGERE', 45); // Etagère à 45€
define('PRIX_PORTE', 990); // Porte à 990 €
define('PRIX_DEBARRAS', 275); // Debarras 275 €

define('TVA', 10); // TVA à 10%

if(isset($_POST['devis'])){

  $msg['devis'] = array();

  if(($_POST['civilite'] === 'Madame' || $_POST['civilite'] === 'Monsieur')
  && isset($_POST['nom'])
  && isset($_POST['ville']) && isset($_POST['cp'])
  && isset($_POST['adresse']) && isset($_POST['tel'])
  && isset($_POST['email']) && isset($_POST['surface'])
  && isset($_POST['hauteur']) // @TODO Remettre par deux les isset();
  && isset($_POST['nb_etageres']) && $_POST['nb_etageres'] >= 0
  && $_POST['nb_etageres'] <= 10 && is_numeric($_POST['nb_etageres'])
  && isset($_POST['nb_portes']) && $_POST['nb_portes'] >= 0
  && $_POST['nb_portes'] <= 10 && is_numeric($_POST['nb_portes'])
  && isset($_POST['debarras']) && $_POST['debarras'] >= 0
  && $_POST['debarras'] <= 10 && is_numeric($_POST['debarras'])){


    if(empty($_POST['nom']) || strlen($_POST['nom']) < 2){
      $msg['devis']['nom'] = '<label for="nom">Veuillez saisir un Nom.</label>';
    }

    if(empty($_POST['adresse']) || strlen($_POST['adresse']) < 2){
      $msg['devis']['adresse'] = '<label for="adresse">Veuillez saisir une Adresse.</label>';
    }

    if(empty($_POST['cp'])){
      $msg['devis']['cp'] = '<label for="cp">Veuillez saisir un Code Postal.</label>';
    }elseif(strlen($_POST['cp']) != 5 || !is_numeric($_POST['cp'])){
      $msg['devis']['cp'] = '<label for="cp">Veuillez saisir un Code Postal valide.</label>';
    }

    if(empty($_POST['ville']) || strlen($_POST['ville']) < 2){
      $msg['devis']['ville'] = '<label for="ville">Veuillez saisir une Ville.</label>';
    }

    $search = array('-', ' ', '.', '+');
    $tel = str_replace($search, '', $_POST['tel']);

    if(empty($tel)){
      $msg['devis']['tel'] = '<label for="tel">Veuillez saisir un Téléphone.</label>';
    }elseif(!is_numeric($tel) || strlen($tel) != 10){
      $msg['devis']['tel'] = '<label for="tel">Veuillez saisir un Téléphone valide.</label>';
    }

    if(empty($_POST['email']) || strlen($_POST['email']) < 2){
      $msg['devis']['email'] = '<label for="email">Veuillez saisir une adresse E-mail.</label>';
    }elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
      $msg['devis']['email'] = '<label for="email">Veuillez saisir une adresse E-mail valide.</label>';
    }

    if(empty($_POST['surface'])){
      $msg['devis']['surface'] = '<label for="surface">Veuillez saisir une Surface.</label>';
    }elseif($_POST['surface'] <= 0 || $_POST['surface'] > 45 || !is_numeric($_POST['surface'])){
      $msg['devis']['surface'] = '<label for="surface">Surface entre 1 et 45 m2.</label>';
    }

    if(empty($_POST['hauteur'])){
      $msg['devis']['hauteur'] = '<label for="hauteur">Veuillez saisir une Hauteur.</label>';
    }elseif($_POST['hauteur'] <= 0 || $_POST['hauteur'] > 10 || !is_numeric($_POST['hauteur'])){
      $msg['devis']['hauteur'] = '<label for="hauteur">Hauteur entre 1 et 10.</label>';
    }


    if(!$msg['devis']){

      if(isset($_SESSION['devis'])) unset($_SESSION['devis']);

      foreach ($_POST as $key => $value){
        $_SESSION['devis'][$key] = $value;
      }

      $totalHT = 0;

      switch (round($_POST['surface'])){
        case 1:
        $totalHT += 3200;
        break;
        case 2:
        $totalHT += 3500;
        break;
        case 3:
        $totalHT += 3700;
        break;
        case 4:
        $totalHT += 3800;
        break;
        case 5:
        $totalHT += 3900;
        break;
        case 6:
        $totalHT += 4100;
        break;
        case 7:
        $totalHT += 4250;
        break;
        case 8:
        $totalHT += 4450;
        break;
        case 9:
        $totalHT += 4700;
        break;
        case 10:
        $totalHT += 4950;
        break;
        case 11:
        $totalHT += 5280;
        break;
        case 12:
        $totalHT += 5760;
        break;
        case 13:
        $totalHT += 6240;
        break;
        case 14:
        $totalHT += 6720;
        break;
        case 15:
        $totalHT += 7200;
        break;
        case 16:
        $totalHT += 7680;
        break;
        case 17:
        $totalHT += 7990;
        break;
        case 18:
        $totalHT += 8280;
        break;
        case 19:
        $totalHT += 8550;
        break;
        case 20:
        $totalHT += 9000;
        break;
        case 21:
        $totalHT += 9450;
        break;
        case 22:
        $totalHT += 9900;
        break;
        case 23:
        $totalHT += 10350;
        break;
        case 24:
        $totalHT += 10800;
        break;
        case 25:
        $totalHT += 11250;
        break;
        case 26:
        $totalHT += 11700;
        break;
        case 27:
        $totalHT += 12150;
        break;
        case 28:
        $totalHT += 12600;
        break;
        case 29:
        $totalHT += 13050;
        break;
        case 30:
        $totalHT += 13500;
        break;
        case 31:
        $totalHT += 13950;
        break;
        case 32:
        $totalHT += 14400;
        break;
        case 33:
        $totalHT += 14850;
        break;
        case 34:
        $totalHT += 15300;
        break;
        case 35:
        $totalHT += 15750;
        break;
        case 36:
        $totalHT += 16200;
        break;
        case 37:
        $totalHT += 16650;
        break;
        case 38:
        $totalHT += 17100;
        break;
        case 39:
        $totalHT += 17550;
        break;
        case 40:
        $totalHT += 18000;
        break;
        case 41:
        $totalHT += 18450;
        break;
        case 42:
        $totalHT += 18900;
        break;
        case 43:
        $totalHT += 19350;
        break;
        case 44:
        $totalHT += 19800;
        break;
        case 45:
        $totalHT += 20250;
        break;
      }

      $prixCave = $totalHT;

      $_SESSION['devis']['prixCave'] = $prixCave;

      // Cubes de la cave
      $cubes = round($_POST['surface']*$_POST['hauteur'], 2);

      $_SESSION['devis']['cubes'] = $cubes;

      // Etageres
      $totalEtageres = PRIX_ETAGERE*$_POST['nb_etageres'];

      $_SESSION['devis']['totalEtageres'] = $totalEtageres;

      $totalHT += $totalEtageres;

      // Portes
      $totalPortes = PRIX_PORTE*$_POST['nb_portes'];

      $_SESSION['devis']['totalPortes'] = $totalPortes;

      $totalHT += $totalPortes;

      // Debarras
      $totalDebarras = PRIX_DEBARRAS*$_POST['debarras'];

      $_SESSION['devis']['totalDebarras'] = $totalDebarras;

      $totalHT += $totalDebarras;

      // Total
      $_SESSION['devis']['totalHT'] = $totalHT;

      // Total TTC
      $totalTTC = $totalHT + ($totalHT*TVA/100);

      $_SESSION['devis']['totalTTC'] = $totalTTC;

      $totalAjoutTVA = $totalTTC-$totalHT;

      $_SESSION['devis']['totalAjoutTVA'] = $totalAjoutTVA;

    }

  } else {

    $msg['devis']['erreur'] = 'Une erreur est survenue.';

  }
}
