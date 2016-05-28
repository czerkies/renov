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

<h1>Modification des tarifs</h1>

<form class="" action="" method="post">
  <table>
    <thead>
      <tr>
        <th>
          Cav'Box
        </th>
        <th>
          Prix
        </th>
      <tr>
    </thead>
    <tbody>
    <?php foreach ($listeTarifs as $key => $value) { ?>
      <tr>
        <td>
          CAV'BOX <b><?= $value->CBOX_KEY; ?></b>
        </td>
        <td>
          <input type="number" min="0" max="" step="1" name="<?= $value->CBOX_KEY; ?>" value="<?= $value->CBOX_PRIX; ?>" placeholder="0000">
        </td>
      </tr>
    <?php } ?>
  </tbody>
  </table>
  <input type="submit" name="maj_prix" value="Enregistrer">
</form>
