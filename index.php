<?php
  include_once 'functions.php';

  //var_dump($_POST);

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Renov devis</title>
    <link rel="stylesheet" type="text/css" href="style_devis.css">
  </head>
  <body>
    <div class="devis_rc">
      <div class="devis_rc--contact">
        <p class="devis_rc--contact_name">Votre contact : Daniel SINNESAL</p>
        <p class="devis_rc--contact_tel">Tel. : 01 53 58 91 85</p>
        <p class="devis_rc--contact_title">Devis estimatif</p>
        <p class="devis_rc--contact_welcome">
          Explication de l'utilisation.
        </p>
      </div>
      <form class="devis" action="#devis" method="post">
        <div class="form_coordonnees">
          <h2>Vos Coordonnées :</h2>
          <div class="form-group">
            <select id="civilite" name="civilite">
              <option disabled>Choisissez votre civilite</option>
              <option value="Madame" <?php if(isset($_POST['civilite']) && $_POST['civilite'] === 'Madame') echo "selected"; ?>>Madame</option>
              <option value="Monsieur" <?php if(isset($_POST['civilite']) && $_POST['civilite'] === 'Monsieur') echo "selected"; ?>>Monsieur</option>
            </select>
          </div>
          <?php if(isset($msg['erreur'])) echo $msg['erreur']; ?>
          <div class="form-group">
            <input type="text" id="nom" name="nom" title="Nom" placeholder="Nom" value="<?php if(isset($_POST['nom'])) echo $_POST['nom']; ?>" required>
            <?php if(isset($msg['nom'])) echo $msg['nom']; ?>
          </div>
          <div class="form-group">
            <input type="text" id="prenom" name="prenom" title="Prénom" placeholder="Prénom" value="<?php if(isset($_POST['prenom'])) echo $_POST['prenom']; ?>" required>
            <?php if(isset($msg['prenom'])) echo $msg['prenom']; ?>
          </div>
          <div class="form-group">
            <input type="text" id="adresse" name="adresse" title="Adresse" placeholder="Adresse" value="<?php if(isset($_POST['adresse'])) echo $_POST['adresse']; ?>" required>
            <?php if(isset($msg['adresse'])) echo $msg['adresse']; ?>
          </div>
          <div class="form-group">
            <input type="text" id="cp" name="cp" title="Code Postal" placeholder="Code Postal" value="<?php if(isset($_POST['cp'])) echo $_POST['cp']; ?>" required>
            <?php if(isset($msg['cp'])) echo $msg['cp']; ?>
          </div>
          <div class="form-group">
            <input type="text" id="ville" name="ville" title="Ville" placeholder="Ville" value="<?php if(isset($_POST['ville'])) echo $_POST['ville']; ?>" required>
            <?php if(isset($msg['ville'])) echo $msg['ville']; ?>
          </div>
          <div class="form-group">
            <input type="tel" id="tel" name="tel" title="Téléphone" placeholder="Téléphone" value="<?php if(isset($_POST['tel'])) echo $_POST['tel']; ?>" required>
            <?php if(isset($msg['tel'])) echo $msg['tel']; ?>
          </div>
          <div class="form-group">
            <input type="email" id="email" name="email" title="E-mail" placeholder="E-mail" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" required>
            <?php if(isset($msg['email'])) echo $msg['email']; ?>
          </div>
        </div>
        <table class="talbeau_devis" id="devis">
          <thead>
            <tr>
              <th class="w_70 tcenter">
                Description
              </th>
              <th class="w_10 tcenter">
                Qte
              </th>
              <th class="w_10 tcenter">
                PU HT
              </th>
              <th class="w_10 tcenter">
                Total HT
              </th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="b_top b_bottom" colspan="4">
                ENSEMBLE CAV'BOX POUR UNE CAVE DE
                <select class="surface" name="surface">
                  <?php for($a = 1; $a < 33; $a++) {
                    echo '<option value="'.$a.'"';
                    if(isset($_POST['surface']) && $_POST['surface'] == $a) echo ' selected';
                    echo '>'.$a.'</option>';
                  } ?>
                  <option value="40">40</option>
                  <option value="42">42</option>
                </select>
                MÈTRE(S) CARRÉS
              </td>
            </tr>
            <tr class="b_bottom">
              <td class="b_right">
                Mise en oeuvre d'un plancher isolant, avec revêtement pour un entretien facile.<br>
                Mise en oeuvre d'un ensemble mural isolant, sur mesure.<br>
                Mise en oeuvre d'un plafond isolant, sur mesure.<br>
                Fourniture et la pose d'un éclairage étanche IP65 36 watts, 120 cm.<br>
                Fourniture et pose, d'aérations, hautes et basses.<br>
                Fourniture et pose de plinthes anti-poussières.<br>
                Fourniture et pose de tringles, sous plafond, utilisables en portant pour vêtements.
              </td>
              <td class="tright b_right">
                1.00<br>
                <em>ENS</em>
              </td>
              <td class="tright b_right">
                <?php
                  if(isset($prixCave)) {
                    echo $prixCave.' €';
                  } else {
                    echo "Validez le devis";
                  }
                ?>
              </td>
              <td class="tright">
                <?php
                  if(isset($prixCave)) {
                    echo $prixCave.' €';
                  } else {
                    echo "Validez le devis";
                  }
                ?>
              </td>
            </tr>
            <tr>
              <td class="" colspan="4">
                <b>La pose de l'ouvrage, conçu en matériaux de construction pour un usage intérieur en milieu humide, répondant à la norme EN 13986, respecte l'aération naturelle de la cave.</b>
              </td>
            </tr>
            <tr>
              <td class="b_top" colspan="4">
                NOTRE OFFRE D'AMÉNAGEMENTS EN OPTION
              </td>
            </tr>
            <tr class="b_top">
              <td class="b_right">
                <input type="checkbox" id="option_etagere" name="option_etagere" <?php if(isset($_POST['option_etagere'])) echo 'checked'; ?>><label for="option_etagere"><b>Étagère sur mesure</b>, profondeur 35 cm, posée sur un ensemble de fixation, permettant le réglage en hauteur.</label>
              </td>
              <td class="tright b_right">
                <select name="nb_etageres">
                  <?php
                  for ($i=1.00; $i <= 10.00; $i++) {
                    echo '<option value="'.$i.'"';
                    if(isset($_POST['nb_etageres']) && $_POST['nb_etageres'] == $i) echo ' selected';
                    echo '>'.$i.'</option>';
                  }
                  ?>
                </select><br>
                <em>ML</em>
              </td>
              <td class="tright b_right">
                45.00
              </td>
              <td class="tright">
                45.00<br>
                <em>En option</em>
              </td>
            </tr>
            <tr class="b_top">
              <td class="b_right">
                <input type="checkbox" id="porte" name="porte" <?php if(isset($_POST['porte'])) echo 'checked'; ?>><label for="porte"><b>Bloc porte de cave métallique sur mesure</b>, trois omégas de renfort, aération basse intégrée, serrure trois points A2P*, livrée avec 3 clefs.</label>
              </td>
              <td class="tright b_right">
                1.00<br>
                <em>Ens</em>
              </td>
              <td class="tright b_right">
                900.00
              </td>
              <td class="tright">
                900.00<br>
                <em>En option</em>
              </td>
            </tr>
            <tr>
              <td class="b_top" colspan="4">
                SERVICE DE DÉBARRAS
              </td>
            </tr>
            <tr class="b_top">
              <td class="b_right">
                <input type="checkbox" id="debarras" name="debarras" <?php if(isset($_POST['debarras'])) echo 'checked'; ?>><label for="debarras"><b>Effets personnels à débarrasser :</b> Tri, mise en sacs, évacuation à dos d'homme et transport en déchetterie ECO-TRI.</label>
              </td>
              <td class="tright b_right">
                1.00<br>
                <em>M3</em>
              </td>
              <td class="tright b_right">
                175.00
              </td>
              <td class="tright">
                175.00<br>
                <em>En option</em>
              </td>
            </tr>
            <tr class="b_top b_bottom">
              <td class="b_right">
                <input type="checkbox" id="effets_perso" name="effets_perso" <?php if(isset($_POST['effets_perso'])) echo 'checked'; ?>><label for="effets_perso"><b>Effets personnels conservés :</b> Tri, déplacement et rangement dans votre cave, à la fin des travaux.</label>
              </td>
              <td class="tright b_right">
                1.00<br>
                <em>Heure</em>
              </td>
              <td class="tright b_right">
                60.00
              </td>
              <td class="tright">
                60.00<br>
                <em>En option</em>
              </td>
            </tr>
            <tr>
              <td></td>
              <td colspan="2" class="tright">
                <b>Total HT</b>
              </td>
              <td class="tright">
                <b><?php if(isset($totalHT)): echo $totalHT; else: echo 0; endif; ?> €</b>
              </td>
            </td>
            <tr>
              <td></td>
              <td colspan="2" class="tright">
                TVA 10.00%
              </td>
              <td class="tright">
                <?php if(isset($totalAjoutTVA)): echo $totalAjoutTVA; else: echo 0; endif;?> €
              </td>
            </tr>
            <tr>
              <td></td>
              <td colspan="2" class="tright">
                <b>Montant TTC</b>
              </td>
              <td class="tright">
                <b><?php if(isset($totalTTC)): echo $totalTTC; else: echo 0; endif;?> €</b>
              </td>
            </tr>
          </tbody>
        </table>
        <input type="submit" name="devis" value="Estimation du devis">
      </form>
    </div>
  </body>
</html>
