<?php

  include_once 'functions.php';

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
      <form class="devis" action="#devis" method="post" id="devis">
      <div class="contact">
        <p>Pour consulter votre devis, merci de compléter vos coordonnées.</p>
        <div class="form-group">
          <select id="civilite" name="civilite">
            <option disabled>Choisissez votre civilite</option>
            <option value="Madame" <?php if((isset($_POST['civilite']) && $_POST['civilite'] === 'Madame')
            || (isset($_SESSION['devis']['civilite']) && $_SESSION['devis']['civilite'] === 'Madame')) echo "selected"; ?>>Madame</option>
            <option value="Monsieur" <?php if((isset($_POST['civilite']) && $_POST['civilite'] === 'Monsieur')
            || (isset($_SESSION['devis']['civilite']) && $_SESSION['devis']['civilite'] === 'Madame')) echo "selected"; ?>>Monsieur</option>
          </select>
        </div>
        <?php if(isset($msg['erreur'])) echo $msg['erreur']; ?>
        <div class="form-group">
          <input type="text" id="nom" name="nom" title="Nom" placeholder="Nom" value="<?php
          if(isset($_POST['nom'])) {
            echo $_POST['nom'];
          } elseif(isset($_SESSION['devis']['nom'])) {
            echo $_SESSION['devis']['nom'];
          } ?>" required>
          <?php if(isset($msg['nom'])) echo $msg['nom']; ?>
        </div>
        <div class="form-group large">
          <input type="text" id="adresse" name="adresse" title="Adresse" placeholder="Adresse" value="<?php if(isset($_POST['adresse'])) {
            echo stripslashes($_POST['adresse']);
          } elseif(isset($_SESSION['devis']['adresse'])) {
            echo stripslashes($_SESSION['devis']['adresse']);
          } ?>" required>
          <?php if(isset($msg['adresse'])) echo $msg['adresse']; ?>
        </div>
        <div class="form-group">
          <input type="text" id="cp" name="cp" title="Code Postal" placeholder="Code Postal" value="<?php
          if(isset($_POST['cp'])) {
            echo $_POST['cp'];
          } elseif(isset($_SESSION['devis']['cp'])) {
            echo $_SESSION['devis']['cp'];
          } ?>" required>
          <?php if(isset($msg['cp'])) echo $msg['cp']; ?>
        </div>
        <div class="form-group">
          <input type="text" id="ville" name="ville" title="Ville" placeholder="Ville" value="<?php
          if(isset($_POST['ville'])) {
            echo $_POST['ville'];
          } elseif(isset($_SESSION['devis']['ville'])) {
            echo $_SESSION['devis']['ville'];
          } ?>" required>
          <?php if(isset($msg['ville'])) echo $msg['ville']; ?>
        </div>
        <div class="form-group">
          <input type="tel" id="tel" name="tel" title="Téléphone" placeholder="Téléphone" value="<?php
          if(isset($_POST['tel'])) {
            echo $_POST['tel'];
          } elseif(isset($_SESSION['devis']['tel'])) {
            echo $_SESSION['devis']['tel'];
          } ?>" required>
          <?php if(isset($msg['tel'])) echo $msg['tel']; ?>
        </div>
        <div class="form-group">
          <input type="email" id="email" name="email" title="E-mail" placeholder="E-mail" value="<?php
          if(isset($_POST['email'])) {
            echo $_POST['email'];
          } elseif(isset($_SESSION['devis']['email'])) {
            echo $_SESSION['devis']['email'];
          } ?>" required>
          <?php if(isset($msg['email'])) echo $msg['email']; ?>
        </div>
      </div>
        <table class="tableau_devis">
          <thead>
            <tr>
              <th class="w_65 tcenter">
                Description
              </th>
              <th class="w_15 tcenter">
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
                    if(isset($_POST['surface']) && $_POST['surface'] == $a) {
                      echo ' selected';
                    } elseif(isset($_SESSION['devis']['surface']) && $_SESSION['devis']['surface'] == $a) {
                      echo ' selected';
                    }
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
                1.00 <em>ENS</em>
              </td>
              <td class="tright b_right">
                <?php
                  if(isset($prixCave)) {
                    echo $prixCave;
                  } elseif(isset($_SESSION['devis']['prixCave'])){
                    echo $_SESSION['devis']['prixCave'];
                  } else {
                    echo '0';
                  }
                ?>.00
              </td>
              <td class="tright">
                <?php
                  if(isset($prixCave)) {
                    echo $prixCave;
                  } elseif(isset($_SESSION['devis']['prixCave'])){
                    echo $_SESSION['devis']['prixCave'];
                  } else {
                    echo '0';
                  }
                ?>.00
              </td>
            </tr>
            <tr>
              <td class="" colspan="4">
                <b>La pose de l'ouvrage, conçu en matériaux de construction pour un usage intérieur en milieu humide, répondant à la norme EN 13986, respecte l'aération naturelle de la cave.</b>
              </td>
            </tr>
            <tr>
              <td class="b_top" colspan="4">
                NOTRE OFFRE D'AMÉNAGEMENTS COMPLÉMENTAIRES
              </td>
            </tr>
            <tr class="b_top">
              <td class="b_right">
                <b>Étagère sur mesure</b>, profondeur 35 cm, posée sur un ensemble de fixation, permettant le réglage en hauteur.
              </td>
              <td class="tright b_right">
                <select name="nb_etageres">
                  <?php
                  for ($i = 0; $i <= 10; $i++) {
                    echo '<option value="'.$i.'"';
                    if(isset($_POST['nb_etageres']) && $_POST['nb_etageres'] == $i) {
                      echo ' selected';
                    } elseif (isset($_SESSION['devis']['nb_etageres']) && $_SESSION['devis']['nb_etageres'] == $i) {
                      echo ' selected';
                    }
                    echo '>'.$i.'.00</option>';
                  }
                  ?>
                </select> <em>ML</em>
              </td>
              <td class="tright b_right">
                45.00
              </td>
              <td class="tright">
                <?php if(isset($totalEtageres)) {
                  echo $totalEtageres;
                } elseif(isset($_SESSION['devis']['totalEtageres'])) {
                  echo $_SESSION['devis']['totalEtageres'];
                } else {
                  echo '0';
                } ?>.00
              </td>
            </tr>
            <tr class="b_top">
              <td class="b_right">
                <b>Bloc porte de cave métallique sur mesure</b>, trois omégas de renfort, aération basse intégrée, serrure trois points A2P*, livrée avec 3 clefs.
              </td>
              <td class="tright b_right">
                <select name="nb_portes">
                  <?php
                  for ($i = 0; $i <= 10; $i++) {
                    echo '<option value="'.$i.'"';
                    if(isset($_POST['nb_portes']) && $_POST['nb_portes'] == $i) {
                      echo ' selected';
                    } elseif (isset($_SESSION['devis']['nb_portes']) && $_SESSION['devis']['nb_portes'] == $i) {
                      echo ' selected';
                    }
                    echo '>'.$i.'.00</option>';
                  }
                  ?>
                </select> <em>Ens</em>
              </td>
              <td class="tright b_right">
                900.00
              </td>
              <td class="tright">
                <?php if(isset($totalPortes)) {
                  echo $totalPortes;
                } elseif(isset($_SESSION['devis']['nb_portes'])) {
                  echo $_SESSION['devis']['totalPortes'];
                } else {
                  echo '0';
                } ?>.00
              </td>
            </tr>
            <tr>
              <td class="b_top" colspan="4">
                SERVICE DE DÉBARRAS
              </td>
            </tr>
            <tr class="b_top">
              <td class="b_right">
                <b>Effets personnels à débarrasser :</b> Tri, mise en sacs, évacuation à dos d'homme et transport en déchetterie ECO-TRI.
              </td>
              <td class="tright b_right">
                <select name="debarras">
                  <?php
                  for ($i = 0; $i <= 10; $i++) {
                    echo '<option value="'.$i.'"';
                    if(isset($_POST['debarras']) && $_POST['debarras'] == $i) {
                      echo ' selected';
                    } elseif (isset($_SESSION['devis']['debarras']) && $_SESSION['devis']['debarras'] == $i) {
                      echo ' selected';
                    }
                    echo '>'.$i.'.00</option>';
                  }
                  ?>
                </select> <em>M3</em>
              </td>
              <td class="tright b_right">
                175.00
              </td>
              <td class="tright">
                <?php if(isset($totalDebarras)) {
                  echo $totalDebarras;
                } elseif(isset($_SESSION['devis']['debarras'])) {
                  echo $_SESSION['devis']['totalDebarras'];
                } else {
                  echo '0';
                } ?>.00
              </td>
            </tr>
            <tr class="b_top b_bottom">
              <td class="b_right">
                <b>Effets personnels conservés :</b> Tri, déplacement et rangement dans votre cave, à la fin des travaux.
              </td>
              <td class="tright b_right">
                <select name="effets_perso">
                  <?php
                  for ($i = 0; $i <= 10; $i++) {
                    echo '<option value="'.$i.'"';
                    if(isset($_POST['effets_perso']) && $_POST['effets_perso'] == $i) {
                      echo ' selected';
                    } elseif (isset($_SESSION['devis']['effets_perso']) && $_SESSION['devis']['effets_perso'] == $i) {
                      echo ' selected';
                    }
                    echo '>'.$i.'.00</option>';
                  }
                  ?>
                </select> <em>Heure</em>
              </td>
              <td class="tright b_right">
                60.00
              </td>
              <td class="tright">
                <?php if(isset($totalEffetsPerso)) {
                  echo $totalEffetsPerso;
                } elseif(isset($_SESSION['devis']['effets_perso'])) {
                  echo $_SESSION['devis']['totalEffetsPerso'];
                } else {
                  echo '0';
                } ?>.00
              </td>
            </tr>
            <tr>
              <td colspan="2" class="tright">
                <b>Total HT</b>
              </td>
              <td colspan="2" class="tright">
                <b><?php if(isset($totalHT)) {
                  echo $totalHT;
                } elseif(isset($_SESSION['devis']['totalHT'])) {
                  echo $_SESSION['devis']['totalHT'];
                } else {
                  echo '0';
                } ?>.00 €</b>
              </td>
            </td>
            <tr>
              <td colspan="2" class="tright">
                TVA 10.00%
              </td>
              <td colspan="2" class="tright">
                <?php if(isset($totalAjoutTVA)) {
                  echo $totalAjoutTVA;
                } elseif(isset($_SESSION['devis']['totalAjoutTVA'])) {
                  echo $_SESSION['devis']['totalAjoutTVA'];
                } else {
                  echo '0';
                }
                ?>.00 €
              </td>
            </tr>
            <tr>
              <td colspan="2" class="tright">
                <b>Montant TTC</b>
              </td>
              <td colspan="2" class="tright">
                <b><?php if(isset($totalTTC)) {
                  echo $totalTTC;
                } elseif(isset($_SESSION['devis']['totalTTC'])) {
                  echo $_SESSION['devis']['totalTTC'];
                } else {
                  echo '0';
                }
                ?>.00 €</b>
              </td>
            </tr>
          </tbody>
        </table>
        <input type="submit" name="devis" value="Estimation du devis">
      </form>
    </div>
  </body>
</html>
