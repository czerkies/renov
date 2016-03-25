<?php

if(isset($_POST['devis'])){

  $msg = [];

  if(($_POST['civilite'] === 'Madame' || $_POST['civilite'] === 'Monsieur')
  && isset($_POST['nom']) && isset($_POST['prenom'])
  && isset($_POST['ville']) && isset($_POST['cp'])
  && isset($_POST['adresse']) && isset($_POST['tel'])
  && isset($_POST['email']) && isset($_POST['surface'])
  && $_POST['surface'] >= 0 && $_POST['surface'] <= 42 && is_numeric($_POST['surface'])
  && isset($_POST['nb_etageres']) && $_POST['nb_etageres'] >= 1 && $_POST['nb_etageres'] <= 10
  && is_numeric($_POST['nb_etageres'])){


    if(empty($_POST['nom']) || strlen($_POST['nom']) < 2){
      $msg['nom'] = '<label for="nom">Veuillez saisir un Nom.</label>';
    }

    if(empty($_POST['prenom']) || strlen($_POST['prenom']) < 2){
      $msg['prenom'] = '<label for="prenom">Veuillez saisir un Prénom.</label>';
    }

    if(empty($_POST['ville']) || strlen($_POST['ville']) < 2){
      $msg['ville'] = '<label for="ville">Veuillez saisir une Ville.</label>';
    }

    if(empty($_POST['cp'])){
      $msg['cp'] = '<label for="cp">Veuillez saisir un Code Postal.</label>';
    }elseif(strlen($_POST['cp']) != 5 || !is_numeric($_POST['cp'])){
      $msg['cp'] = '<label for="cp">Veuillez saisir un Code Postal valide.</label>';
    }

    if(empty($_POST['adresse']) || strlen($_POST['adresse']) < 2){
      $msg['adresse'] = '<label for="adresse">Veuillez saisir une Adresse.</label>';
    }

    $search = array('-', ' ', '.', '+');
    $tel = str_replace($search, '', $_POST['tel']);

    if(empty($tel)){
      $msg['tel'] = '<label for="tel">Veuillez saisir un Téléphone.</label>';
    }elseif(!is_numeric($tel) || strlen($tel) != 10){
      $msg['tel'] = '<label for="tel">Veuillez saisir un Téléphone valide.</label>';
    }

    if(empty($_POST['email']) || strlen($_POST['email']) < 2){
      $msg['email'] = '<label for="email">Veuillez saisir une adresse E-mail.</label>';
    }elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
      $msg['email'] = '<label for="email">Veuillez saisir une adresse E-mail valide.</label>';
    }

    if(!$msg){

      $totalHT = 0;

      switch ($_POST['surface']){
        case 1:
        case 2:
        case 3:
        case 4:
        $totalHT += 3800.00;
        break;
        case 5:
        $totalHT += 4050.00;
        break;
        case 6:
        $totalHT += 4600.00;
        break;
        case 7:
        $totalHT += 4350.00;
        break;
        case 8:
        $totalHT += 4550.00;
        break;
        case 9:
        $totalHT += 4950.00;
        break;
        case 10:
        $totalHT += 5450.00;
        break;
        case 11:
        $totalHT += 5850.00;
        break;
        case 12:
        $totalHT += 5750.00;
        break;
        case 13:
        $totalHT += 6450.00;
        break;
        case 14:
        $totalHT += 6750.00;
        break;
        case 15:
        $totalHT += 7200.00;
        break;
        case 16:
        $totalHT += 7650.00;
        break;
        case 17:
        $totalHT += 8150.00;
        break;
        case 18:
        $totalHT += 8650.00;
        break;
        case 19:
        $totalHT += 9150.00;
        break;
        case 20:
        $totalHT += 9600.00;
        break;
        case 21:
        $totalHT += 10050.00;
        break;
        case 22:
        $totalHT += 10550.00;
        break;
        case 23:
        $totalHT += 11050.00;
        break;
        case 24:
        $totalHT += 11550.00;
        break;
        case 25:
        $totalHT += 12000.00;
        break;
        case 26:
        $totalHT += 12450.00;
        break;
        case 27:
        $totalHT += 12950.00;
        break;
        case 28:
        $totalHT += 13450.00;
        break;
        case 29:
        $totalHT += 13950.00;
        break;
        case 30:
        $totalHT += 14400.00;
        break;
        case 31:
        $totalHT += 14850.00;
        break;
        case 32:
        case 33:
        case 34:
        case 35:
        case 36:
        case 37:
        case 38:
        case 39:
        $totalHT += 15350.00;
        break;
        case 40:
        case 41:
        case 42:
        case 43:
        case 44:
        $totalHT += 19200.00;
        break;
        case 45:
        $totalHT += 22500.00;
        break;
      }

      $prixCave = $totalHT;

      if(isset($_POST['option_etagere'])) {

        $totalHT += 45*$_POST['nb_etageres'];

      }

      if(isset($_POST['porte'])) $totalHT += 900;

      if(isset($_POST['debarras'])) $totalHT += 175;

      if(isset($_POST['effets_perso'])) $totalHT += 60;

      $totalTTC = $totalHT*1.10;

      $totalAjoutTVA = $totalTTC-$totalHT;

    }

  } else {
    $msg['erreur'] = 'Une erreur est survenue.';
  }
}
