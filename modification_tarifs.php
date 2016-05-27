<?php

/*
  Template Name: Modification tarifs
*/

if($_SERVER['SERVER_NAME'] === 'localhost') {

  include_once 'functions.php';

  $req = "SELECT CBOX_KEY, CBOX_PRIX FROM wp_cbox";

  $cbox_prixBD = $pdo->query($req);

  $listeTarifs = $cbox_prixBD->fetchAll(PDO::FETCH_OBJ);

  echo '<link rel="stylesheet" type="text/css" href="style_devis.css">';

} else {

  include_once get_template_directory().'/includes/functions.php';

  get_header();

  echo '<link rel="stylesheet" type="text/css" href="'.get_template_directory_uri().'/css/style_devis.css">';

}

?>

<h2>Modifier les tarifs</h2>

<?php foreach ($listeTarifs as $key => $value) { ?>
  <?= $value->CBOX_PRIX; ?><br>
<?php } ?>
