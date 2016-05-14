<?php

session_start();

// Connection au serveur si localhost
if($_SERVER['SERVER_NAME'] === 'localhost'){

  try {
  	$pdo = new PDO('mysql:host=localhost;dbname=renov', 'root', 'root', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8, lc_time_names = 'fr_FR'"));
  } catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
  }

  $wording = $pdo->query("SELECT MSG_KEY, MSG_VALUE FROM wp_wording");

  $msgDonnees = $wording->fetchAll(PDO::FETCH_OBJ);

  echo "<pre>";
  //var_dump($msg);
  //echo "</pre>";

  $msg = array();
  foreach ($msgDonnees as $key => $value) {
    $msg[$msgDonnees[1]->MSG_KEY] = $msgDonnees[1]->MSG_VALUE;
  }
  echo "tesr : ";
  var_dump($msg);

}

define('PRIX_ETAGERE', 45); // Etagère à 45€
define('PRIX_PORTE', 990); // Porte à 990 €
define('PRIX_DEBARRAS', 275); // Debarras 275 €

define('TVA', 10); // TVA à 10%

function sendMail($to, $subject, $content, $from = 'devis@renovcave.fr'){

  $headers = 'Content-Type: text/html; charset=\"UTF-8\";' . "\r\n";
  $headers .= 'FROM: Renov\'Cave <'.$from.'>' . "\r\n";

  $subjectFormat = "Renov'Cave - ".$subject;

  mail($to, $subjectFormat, $content, $headers);

}

if(isset($_POST['devis'])){

  $msg['devis'] = array();

  if(($_POST['civilite'] === 'Madame' || $_POST['civilite'] === 'Monsieur')
  && isset($_POST['nom']) && isset($_POST['adresse'])
  && isset($_POST['cp']) && isset($_POST['ville'])
  && isset($_POST['tel']) && isset($_POST['email'])
  && isset($_POST['surface']) && isset($_POST['hauteur'])
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


      // Enregistrement des données en BDD
      global $wpdb;

      // Récupérartion des données
      foreach ($_POST as $key => $value){
        $_POST[$key] = htmlspecialchars($value, ENT_QUOTES);
      }

      extract($_POST);

        if($_SERVER['SERVER_NAME'] === 'localhost'){

          $existProspects = $pdo->query("SELECT id_prospects FROM wp_prospects WHERE email = '$email'");

          $exist = $existProspects->fetchColumn();

        } else {

          $exist = $wpdb->get_row("SELECT id_prospects FROM {$wpdb->prefix}prospects WHERE email = '$email'");

        }

      if($exist){

        if($_SERVER['SERVER_NAME'] === 'localhost'){

          $req = "UPDATE wp_prospects SET
            civilite = :civilite,
            nom = :nom,
            adresse = :adresse,
            cp = :cp,
            ville = :ville,
            tel = :tel,
            surface = :surface,
            total = :totalTTC,
            date_devis = NOW()
            WHERE email = :email";

          $updateProspects = $pdo->prepare($req);

          $updateProspects->bindValue(':civilite', $civilite, PDO::PARAM_STR);
          $updateProspects->bindValue(':nom', $nom, PDO::PARAM_STR);
          $updateProspects->bindValue(':adresse', $adresse, PDO::PARAM_STR);
          $updateProspects->bindValue(':cp', $cp, PDO::PARAM_STR);
          $updateProspects->bindValue(':ville', $ville, PDO::PARAM_STR);
          $updateProspects->bindValue(':tel', $tel, PDO::PARAM_STR);
          $updateProspects->bindValue(':surface', $surface, PDO::PARAM_STR);
          $updateProspects->bindValue(':totalTTC', $totalTTC, PDO::PARAM_STR);
          $updateProspects->bindValue(':email', $email, PDO::PARAM_STR);

          $updateProspects->execute();

        } else {

          $wpdb->update("{$wpdb->prefix}prospects",
            array(
              'civilite' => $civilite,
              'nom' => $nom,
              'adresse' => stripslashes($adresse),
              'cp' => $cp,
              'ville' => $ville,
              'tel' => $tel,
              'surface' => $surface,
              'total' => $totalTTC,
              'date_devis' => date('Y-m-d H:i:s')
            ),
            array('email' => $email)
          ) or die(mysql_error());

        }

      } else {

        if($_SERVER['SERVER_NAME'] === 'localhost'){

          $req = "INSERT INTO wp_prospects(civilite, nom, adresse, cp, ville, tel, email, surface, total, date_devis)
          VALUES(:civilite, :nom, :adresse, :cp, :ville, :tel, :email, :surface, :totalTTC, NOW())";

          $insertProspects = $pdo->prepare($req);

          $insertProspects->bindValue(':civilite', $civilite, PDO::PARAM_STR);
          $insertProspects->bindValue(':nom', $nom, PDO::PARAM_STR);
          $insertProspects->bindValue(':adresse', $adresse, PDO::PARAM_STR);
          $insertProspects->bindValue(':cp', $cp, PDO::PARAM_STR);
          $insertProspects->bindValue(':ville', $ville, PDO::PARAM_STR);
          $insertProspects->bindValue(':tel', $tel, PDO::PARAM_STR);
          $insertProspects->bindValue(':email', $email, PDO::PARAM_STR);
          $insertProspects->bindValue(':surface', $surface, PDO::PARAM_STR);
          $insertProspects->bindValue(':totalTTC', $totalTTC, PDO::PARAM_STR);

          $insertProspects->execute();

        } else {

          $wpdb->insert("{$wpdb->prefix}prospects",
            array(
              'civilite' => $civilite,
              'nom' => $nom,
              'adresse' => stripslashes($adresse),
              'cp' => $cp,
              'ville' => $ville,
              'tel' => $tel,
              'email' => $email,
              'surface' => $surface,
              'total' => $totalTTC,
              'date_devis' => date('Y-m-d H:i:s')
            )
          ) or die(mysql_error());

        }

        $content = '
          <div style="width:90%;margin:50px 5%;">

            <h2>Nouvelle de demande de devis</h2>

            <h3>La demande concerne une CAV\'BOX SUR MESURE pour une cave de '.$_SESSION['devis']['surface'].' mètre(s) carrés.</h3>

            <p>
              <b>Civilité :</b> '.$_POST['civilite'].'<br>
              <b>Nom :</b> '.$_POST['nom'].'<br>
              <b>Adresse :</b> '.stripslashes($_POST['adresse']).'<br>
              <b>Code Postal :</b> '.$_POST['cp'].'<br>
              <b>Ville :</b> '.$_POST['ville'].'<br>
              <b>Téléphone :</b> '.$_POST['tel'].'<br>
              <b>Email :</b> '.$_POST['email'].'<br>
              <b>Surface :</b> '.$_POST['surface'].'<br>
              <b>Hauteur :</b> '.$_POST['hauteur'].'<br>
              <b>Total :</b> '.$totalTTC.'<br>
            </p>

          </div>
        ';

        sendMail(
          'roman.czerkies@gmail.com',
          'Nouvelle demande de devis - '.strtoupper($_POST['nom']),
          $content
        );

      }

    }

  } else {

    $msg['devis']['erreur'] = 'Une erreur est survenue.';

  }

}


if(isset($_POST['demande_rdv'])){

  $to = $_SESSION['devis']['email'];

  $subject = 'Demande de rendez-vous';

  $content = '
    <div style="width:90%;margin:50px 5%;">

      <h2>Demande de rendez-vous à domicile</h2>

      <p>Vous avez fait une demande de rendez-vous à votre domicile</p>

      <p>Nous vous rappelerons au numéro suivant : '.$_SESSION['devis']['tel'].'.</p>

      <p>Votre demande concerne une CAV\'BOX SUR MESURE pour une cave de '.$_SESSION['devis']['cubes'].' mètre(s) cubes.</p>

      <h3>Vos informations :</h3>
      <p>
        <b>Civilité :</b> '.$_SESSION['devis']['civilite'].'<br>
        <b>Nom :</b> '.$_SESSION['devis']['nom'].'<br>
        <b>Adresse :</b> '.stripslashes($_SESSION['devis']['adresse']).'<br>
        <b>Code Postal :</b> '.$_SESSION['devis']['cp'].'<br>
        <b>Ville :</b> '.$_SESSION['devis']['ville'].'<br>
        <b>Téléphone :</b> '.$_SESSION['devis']['tel'].'<br>
        <b>Email :</b> '.$_SESSION['devis']['email'].'<br>
        <b>Surface :</b> '.$_SESSION['devis']['surface'].'<br>
        <b>Hauteur :</b> '.$_SESSION['devis']['hauteur'].'<br>
        <b>Total :</b> '.$_SESSION['devis']['totalTTC'].'<br>
      </p>

    </div>
  ';

  sendMail($to, $subject, $content);

  $subjectAdmin = 'Demande de rendez-vous | '.strtolower($nom).' '.$prenom;

  $contentAdmin = '
    <div style="width:90%;margin:50px 5%;">

      <h2>Demande de rendez-vous</h2>

      <h3>Demande de rendez-vous : '.strtolower($nom).' '.$prenom.'</h3>

      <p>La demande concerne une CAV\'BOX SUR MESURE pour une cave de '.$_SESSION['devis']['surface'].' mètre(s) carrés.</p>

      <p>
        <b>Civilité :</b> '.$_SESSION['devis']['civilite'].'<br>
        <b>Nom :</b> '.$_SESSION['devis']['nom'].'<br>
        <b>Adresse :</b> '.stripslashes($_SESSION['devis']['adresse']).'<br>
        <b>Code Postal :</b> '.$_SESSION['devis']['cp'].'<br>
        <b>Ville :</b> '.$_SESSION['devis']['ville'].'<br>
        <b>Téléphone :</b> '.$_SESSION['devis']['tel'].'<br>
        <b>Email :</b> '.$_SESSION['devis']['email'].'<br>
        <b>Surface :</b> '.$_SESSION['devis']['surface'].'<br>
        <b>Hauteur :</b> '.$_SESSION['devis']['hauteur'].'<br>
        <b>Total :</b> '.$_SESSION['devis']['totalTTC'].'<br>
      </p>

    </div>
  ';

  sendMail('roman.czerkies@gmail.com', $subjectAdmin, $contentAdmin, 'rendez-vous@renovcave.com');

}
