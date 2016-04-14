<?php

/*
    Template Name: Liste prospects devis
*/

if($_SERVER['SERVER_NAME'] === 'localhost'){

  include_once 'functions.php';

  // Données si sur serveur LOCAL
  $donnees = $pdo->query("SELECT * FROM wp_prospects");
  $prospects = $donnees->fetchAll(PDO::FETCH_OBJ);

  echo '<link rel="stylesheet" type="text/css" href="style_devis.css">';

} else {

  // Vérification de l'utilisateur connecté
  if (!is_user_logged_in()) {

      wp_redirect(home_url());
      exit;

  }

  include_once get_template_directory().'/includes/functions.php';

  // Récupération des données sur WP
  global $wpdb;
  $prospects = $wpdb->query("SELECT * FROM {$wpdb->prefix}prospects");

  get_header();

  echo '<link rel="stylesheet" type="text/css" href="'.get_template_directory_uri().'/css/style_devis.css">';

}

?>
<div class="container">
  <div class="row">
    <div class="span12" data-motopress-type="static" data-motopress-static-file="static/static-title.php">
  		<section class="title-section">
  	    <h1 class="title-header">Liste des prospects</h1>
  	 </section>
    </div>
  </div>
  <table border="1" class="tableau_devis">
    <thead>
      <tr>
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
    <tbody>
      <?php foreach ($prospects as $value) { ?>
        <tr>
          <td><?= $value->civilite; ?></td>
          <td><?= $value->nom; ?></td>
          <td><?= $value->adresse; ?></td>
          <td><?= $value->cp; ?></td>
          <td><?= $value->ville; ?></td>
          <td><?= $value->tel; ?></td>
          <td><?= $value->email; ?></td>
          <td><?= $value->surface; ?></td>
          <td><?= $value->total; ?></td>
          <td><?= $value->date_devis; ?></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
<?php

  if($_SERVER['SERVER_NAME'] != 'localhost') get_footer();

?>
