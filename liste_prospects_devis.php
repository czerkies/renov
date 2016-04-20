<?php

/*
    Template Name: Liste prospects devis
*/

if($_SERVER['SERVER_NAME'] === 'localhost'){

  include_once 'functions.php';

  // Données si sur serveur LOCAL
  $donnees = $pdo->query("SELECT *, DATE_FORMAT(date_devis, '%d/%m/%Y à %H:%i') as date_wp FROM wp_prospects");
  $prospects = $donnees->fetchAll(PDO::FETCH_OBJ);

  //echo '<link rel="stylesheet" type="text/css" href="style_devis.css">';

} else {

  // Vérification de l'utilisateur connecté
  if (!is_user_logged_in()) {

      wp_redirect(home_url());
      exit;

  }

  include_once get_template_directory().'/includes/functions.php';

  // Récupération des données sur WP
  global $wpdb;
  $prospects = $wpdb->get_results("SELECT *, DATE_FORMAT(date_devis, '%d/%m/%Y à %H:%i') as date_wp FROM {$wpdb->prefix}prospects");

  //echo '<link rel="stylesheet" type="text/css" href="'.get_template_directory_uri().'/css/style_devis.css">';

}

?>
<div class="container">
  <h2>Liste des prospects</h2>
  <table border="1" style="width: 90%;margin: 50px 5%;border-collapse: collapse;" class="tableau_devis">
    <thead>
      <tr>
        <th>N°</th>
        <th>Civilité</th>
        <th>Nom</th>
        <th>Adresse</th>
        <th>Code Postal</th>
        <th>Ville</th>
        <th>Téléphone</th>
        <th>Email</th>
        <th>Surface</th>
        <th>Total</th>
        <th>Date demande de devis</th>
      </tr>
    </thead>
    <tbody style="text-align:center;">
      <?php $i=1; foreach ($prospects as $value) { ?>
        <tr>
          <td><?= $i; ?></td>
          <td><?= $value->civilite; ?></td>
          <td><?= $value->nom; ?></td>
          <td><?= $value->adresse; ?></td>
          <td><?= $value->cp; ?></td>
          <td><?= $value->ville; ?></td>
          <td><?= $value->tel; ?></td>
          <td><?= $value->email; ?></td>
          <td><?= $value->surface; ?></td>
          <td><?= $value->total; ?></td>
          <td><?= $value->date_wp; ?></td>
        </tr>
      <?php $i++; } ?>
    </tbody>
  </table>
</div>
