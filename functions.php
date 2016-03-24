<?php

$prix = "Validez le devis";

if(isset($_POST['devis'])){

  $msg = [];

  if(($_POST['civilite'] === 'Madame' || $_POST['civilite'] === 'Monsieur')
  && isset($_POST['nom']) && isset($_POST['prenom'])
  && isset($_POST['ville']) && isset($_POST['cp'])
  && isset($_POST['adresse']) && isset($_POST['tel'])
  && isset($_POST['email']) && isset($_POST['surface'])
  && $_POST['surface'] >= 0 && $_POST['surface'] <= 42 && is_numeric($_POST['surface'])){


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
        $totalHT += 3800;
        break;

        case 5:
        $totalHT += 10000;
        break;

        default:
        $totalHT += 1000;
        break;
      }

      if(isset($_POST['option_etagere'])) $totalHT += 45;

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
