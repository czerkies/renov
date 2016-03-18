<?php

if(isset($_POST['devis'])){

  $msg = array();

  if(($_POST['civilite'] === 'Madame' || $_POST['civilite'] === 'Monsieur')
  && isset($_POST['nom']) && isset($_POST['prenom'])
  && isset($_POST['ville']) && isset($_POST['cp'])
  && isset($_POST['adresse']) && isset($_POST['tel'])
  && isset($_POST['email']) && isset($_POST['civilite'])
  && isset($_POST['surface'])){


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

    if(empty($_POST['surface'])){
      $msg['surface'] = '<label for="surface">Veuillez saisir une surface</label>';
    }elseif(!is_numeric($_POST['surface'])){
      $msg['surface'] = '<label for="surface">Veuillez saisir une surface au format numérique</label>';
    }elseif($_POST['surface'] <= 1 || $_POST['surface'] > 9999){
      $msg['surface'] = '<label for="surface">Veuillez saisir une surface convenable</label>';
    }

    if(!$msg){

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
    $msg['erreur'] = 'Une erreur est survenue.';
  }
}
