<?php

/*
  Template Name: Modification devis
*/

if($_SERVER['SERVER_NAME'] === 'localhost') {

  include_once 'functions.php';

  echo '<link rel="stylesheet" type="text/css" href="style_devis.css">';

} else {

  include_once get_template_directory().'/includes/functions.php';

  get_header();

  echo '<link rel="stylesheet" type="text/css" href="'.get_template_directory_uri().'/css/style_devis.css">';

}

?>

<h1>Modification du devis</h1>

<form class="" action="" method="post">

  <label for="HEADER">
    <h2>Message accueil :</h2>
  </label>

  <textarea name="HEADER" id="HEADER" required><?= $msg['HEADER']; ?></textarea>

  <h2>Formulaire :</h2>

  <table>
    <tbody>
      <tr>
        <td>
          <label for="CIVILITE">Champs CIVILITE :</label>
          <input type="text" name="CIVILITE" id="CIVILITE" value="<?= $msg['CIVILITE']; ?>" required>
        </td>
        <td>
          <label for="NOM">Champs NOM :</label>
          <input type="text" name="NOM" id="NOM" value="<?= $msg['NOM']; ?>" required>
        </td>
      </tr>
      <tr>
        <td colspan="2">
          <label for="ADRESSE">Champs ADRESSE :</label>
          <input type="text" name="ADRESSE" id="ADRESSE" value="<?= $msg['ADRESSE']; ?>" required>
        </td>
      </tr>
      <tr>
        <td>
          <label for="CP">Champs CP :</label>
          <input type="text" name="CP" id="CP" value="<?= $msg['CP']; ?>" required>
        </td>
        <td>
          <label for="VILLE">Champs VILLE :</label>
          <input type="text" name="VILLE" id="VILLE" value="<?= $msg['VILLE']; ?>" required>
        </td>
      </tr>
      <tr>
        <td>
          <label for="TEL">Champs TEL :</label>
          <input type="text" name="TEL" id="TEL" value="<?= $msg['TEL']; ?>" required>
        </td>
        <td>
          <label for="MAIL">Champs MAIL :</label>
          <input type="text" name="MAIL" id="MAIL" value="<?= $msg['MAIL']; ?>" required>
        </td>
      </tr>
      <tr>
        <td>
          <label for="SURFACE">Champs SURFACE :</label>
          <input type="text" name="SURFACE" id="SURFACE" value="<?= $msg['SURFACE']; ?>" required>
        </td>
        <td>
          <label for="HAUTEUR">Champs HAUTEUR :</label>
          <input type="text" name="HAUTEUR" id="HAUTEUR" value="<?= $msg['HAUTEUR']; ?>" required>
        </td>
      </tr>
    </tbody>
  </table>

  <h2>Devis :</h2>

  <table>
    <thead>
      <tr>
        <td>
          <label for="DESC">Colone DESCRIPTION :</label>
          <input type="text" name="DESC" id="DESC" value="<?= $msg['DESC']; ?>" required>
        </td>
        <td>
          <label for="QT">Colone QUANTITE :</label>
          <input type="text" name="QT" id="QT" value="<?= $msg['QT']; ?>" required>
        </td>
        <td>
          <label for="PU">Colone Produit Unitaire :</label>
          <input type="text" name="PU" id="PU" value="<?= $msg['PU']; ?>" required>
        </td>
        <td>
          <label for="TOTAL">Colone Total :</label>
          <input type="text" name="TOTAL" id="TOTAL" value="<?= $msg['TOTAL']; ?>" required>
        </td>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>
          <label for="TITRE_START">Titre Avant Validation :</label>
          <input type="text" name="TITRE_START" id="TITRE_START" value="<?= $msg['TITRE_START']; ?>" required>
        </td>
        <td>
          <label for="TITRE_MID">Titre Après validation :</label>
          <input type="text" name="TITRE_MID" id="TITRE_MID" value="<?= $msg['TITRE_MID']; ?>" required> XX M2
        </td>
        <td>
          <input type="text" name="TITRE_END" id="TITRE_END" value="<?= $msg['TITRE_END']; ?>" required>
        </td>
      </tr>
      <tr>
        <td colspan="4">
          <label for="DESC_BOX">Description d'une Cav'Box</label>
          <textarea name="DESC_BOX" id="DESC_BOX" required><?= $msg['DESC_BOX']; ?></textarea>
        </td>
      </tr>
    </tbody>
  </table>

  <h2>Options :</h2>

  <table>
    <thead>
      <tr>
        <th>
            Nom de l'option :
        </th>
        <th>
            Unité :
        </th>
        <th>
            Prix :
        </th>
      </tr>
    </thead>
    <tbody>
      <?php for($i=1; $i<4; $i++) { ?>
        <tr>
          <td colspan="3">
            <h2>Groupe options <?= $i; ?></h2>
          </td>
        </tr>
        <tr>
          <td colspan="3">
            <label for="<?= $options['GRTITRE_'.$i]['KEY']; ?>">Groupe <?= $i; ?></label>
            <input type="text" name="<?= $options['GRTITRE_'.$i]['KEY']; ?>" id="<?= $options['GRTITRE_'.$i]['KEY']; ?>" value="<?= $options['GRTITRE_'.$i]['VALUE']; ?>" required>
          </td>
        </tr>
        <?php for($j=1; $j<5; $j++) { ?>
          <tr>
            <td>
              <label for="<?= $options['OPT_'.$i.'_'.$j]['KEY'].'NAME'; ?>">Option <?= $j; ?></label>
              <input type="text" name="<?= $options['OPT_'.$i.'_'.$j]['KEY'].'NAME'; ?>" id="<?= $options['OPT_'.$i.'_'.$j]['KEY'].'NAME'; ?>" value="<?= $options['OPT_'.$i.'_'.$j]['VALUE']; ?>" required>
            </td>
            <td>
              <label for="<?= $options['OPT_'.$i.'_'.$j]['KEY'].'UNIT'; ?>">Unité <?= $j; ?></label>
              <input type="text" name="<?= $options['OPT_'.$i.'_'.$j]['KEY'].'UNIT'; ?>" id="<?= $options['OPT_'.$i.'_'.$j]['KEY'].'UNIT'; ?>" value="<?= $options['OPT_'.$i.'_'.$j]['UNITE']; ?>" required>
            </td>
            <td>
              <label for="<?= $options['OPT_'.$i.'_'.$j]['KEY'].'PRIX'; ?>">Prix <?= $j; ?></label>
              <input type="text" name="<?= $options['OPT_'.$i.'_'.$j]['KEY'].'PRIX'; ?>" id="<?= $options['OPT_'.$i.'_'.$j]['KEY'].'PRIX'; ?>" value="<?= $options['OPT_'.$i.'_'.$j]['PRIX']; ?>" required>
            </td>
          </tr>
        <?php }
      } ?>
    </tbody>
  </table>

  <input type="submit" name="modif_devis" value="Modifier le formulaire">

</form>
