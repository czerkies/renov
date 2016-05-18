<?php

/*
    Template Name: Devis Renov
*/

if($_SERVER['SERVER_NAME'] === 'localhost'){

  include_once 'functions.php';

  echo '<link rel="stylesheet" type="text/css" href="style_devis.css">';

} else {

  include_once get_template_directory().'/includes/functions.php';

  get_header();

  echo '<link rel="stylesheet" type="text/css" href="'.get_template_directory_uri().'/css/style_devis.css">';

}

?>
<div class="container">
  <div class="row">
    <div class="span12" data-motopress-type="static" data-motopress-static-file="static/static-title.php">
  		<section class="title-section">
  	    <h1 class="title-header"><?= $msg['HEADER']; ?></h1>
  	 </section>
    </div>
  </div>
  <div class="devis_rc">
    <form class="devis" action="#devis" method="post" id="devis">
    <div class="contact">
      <?php
      if(!empty($msg['devis'])) {
        echo '<div class="errors">';
        foreach ($msg['devis'] as $key => $value) {
          echo $msg['devis'][$key];
        }
        echo '</div>';
      }
      ?>
      <div class="form-group">
        <select id="civilite" name="civilite">
          <option disabled><?= $msg['CIVILITE']; ?></option>
          <option value="Madame" <?php if((isset($_POST['civilite']) && $_POST['civilite'] === 'Madame')
          || (isset($_SESSION['devis']['civilite']) && $_SESSION['devis']['civilite'] === 'Madame')) echo "selected"; ?>>Madame</option>
          <option value="Monsieur" <?php if((isset($_POST['civilite']) && $_POST['civilite'] === 'Monsieur')
          || (isset($_SESSION['devis']['civilite']) && $_SESSION['devis']['civilite'] === 'Madame')) echo "selected"; ?>>Monsieur</option>
        </select>
      </div>
      <div class="form-group<?php if(isset($msg['devis']['nom'])) echo ' error'; ?>">
        <input type="text" id="nom" name="nom" title="Nom" placeholder="<?= $msg['NOM']; ?>" value="<?php
        if(isset($_POST['nom'])) {
          echo $_POST['nom'];
        } elseif(isset($_SESSION['devis']['nom'])) {
          echo $_SESSION['devis']['nom'];
        } ?>" required>
        <?php if(isset($msg['nom'])) echo $msg['nom']; ?>
      </div>
      <div class="form-group large<?php if(isset($msg['devis']['adresse'])) echo ' error'; ?>">
        <input type="text" id="adresse" name="adresse" title="Adresse" placeholder="<?= $msg['ADRESSE']; ?>" value="<?php if(isset($_POST['adresse'])) {
          echo stripslashes($_POST['adresse']);
        } elseif(isset($_SESSION['devis']['adresse'])) {
          echo stripslashes($_SESSION['devis']['adresse']);
        } ?>" required>
      </div>
      <div class="form-group<?php if(isset($msg['devis']['cp'])) echo ' error'; ?>">
        <input type="text" id="cp" name="cp" title="Code Postal" placeholder="<?= $msg['CP']; ?>" value="<?php
        if(isset($_POST['cp'])) {
          echo $_POST['cp'];
        } elseif(isset($_SESSION['devis']['cp'])) {
          echo $_SESSION['devis']['cp'];
        } ?>" required>
      </div>
      <div class="form-group<?php if(isset($msg['devis']['ville'])) echo ' error'; ?>">
        <input type="text" id="ville" name="ville" title="Ville" placeholder="<?= $msg['VILLE']; ?>" value="<?php
        if(isset($_POST['ville'])) {
          echo $_POST['ville'];
        } elseif(isset($_SESSION['devis']['ville'])) {
          echo $_SESSION['devis']['ville'];
        } ?>" required>
      </div>
      <div class="form-group<?php if(isset($msg['devis']['tel'])) echo ' error'; ?>">
        <input type="tel" id="tel" name="tel" title="Téléphone" placeholder="<?= $msg['TEL']; ?>" value="<?php
        if(isset($_POST['tel'])) {
          echo $_POST['tel'];
        } elseif(isset($_SESSION['devis']['tel'])) {
          echo $_SESSION['devis']['tel'];
        } ?>" required>
      </div>
      <div class="form-group<?php if(isset($msg['devis']['email'])) echo ' error'; ?>">
        <input type="email" id="email" name="email" title="E-mail" placeholder="<?= $msg['MAIL']; ?>" value="<?php
        if(isset($_POST['email'])) {
          echo $_POST['email'];
        } elseif(isset($_SESSION['devis']['email'])) {
          echo $_SESSION['devis']['email'];
        } ?>" required>
      </div>
      <div class="form-group<?php if(isset($msg['devis']['surface'])) echo ' error'; ?>">
        <input type="number" min="1" max="45" step="0.01" id="surface" name="surface" title="Surface de votre cave en M2" placeholder="<?= $msg['SURFACE']; ?>" value="<?php
        if(isset($_POST['surface'])) {
          echo $_POST['surface'];
        } elseif(isset($_SESSION['devis']['surface'])) {
          echo $_SESSION['devis']['surface'];
        } ?>" required>
      </div>
      <div class="form-group<?php if(isset($msg['devis']['hauteur'])) echo ' error'; ?>">
        <input type="number" min="1" max="10" step="0.01" id="hauteur" name="hauteur" title="Hauteur de votre cave en CM" placeholder="<?= $msg['HAUTEUR']; ?>" value="<?php
        if(isset($_POST['hauteur'])) {
          echo $_POST['hauteur'];
        } elseif(isset($_SESSION['devis']['hauteur'])) {
          echo $_SESSION['devis']['hauteur'];
        } ?>" required>
      </div>
    </div>
      <table class="tableau_devis">
        <thead>
          <tr>
            <th class="w_65 tcenter">
              <?= $msg['DESC']; ?>
            </th>
            <th class="w_15 tcenter">
              <?= $msg['QT']; ?>
            </th>
            <th class="w_10 tcenter">
              <?= $msg['PU']; ?>
            </th>
            <th class="w_10 tcenter">
              <?= $msg['TOTAL']; ?>
            </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="b_top b_bottom" colspan="4">
              <?= $msg['TITRE_START']; ?>
              <?php if(isset($cubes) || isset($_SESSION['devis']['cubes'])) {
                echo $msg['TITRE_MID'].' '; if(isset($cubes)) {
                  echo $cubes;
                } else {
                  echo $_SESSION['devis']['cubes'];
                } echo $msg['TITRE_END']; } ?>
            </td>
          </tr>
          <tr class="b_bottom">
            <td class="b_right">
              <?= $msg['DESC_BOX']; ?>
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
              <b><?= $msg['SOUS_DESC_BOX']; ?></b>
            </td>
          </tr>
          <?php for($i=1; $i<$nbOptionsDonnees; $i++) {
            if(!empty($options['GRTITRE_'.$i]['VALUE'])) { ?>
              <tr>
                <td class="b_top" colspan="4">
                  <?= $options['GRTITRE_'.$i]['VALUE']; ?>
                </td>
              </tr>
              <?php for($j=1; $j<$nbOptionsDonnees; $j++) {
                if(!empty($options['OPT_'.$i.'_'.$j]['VALUE'])) { ?>
                  <tr class="b_top">
                    <td class="b_right">
                      <label for="<?= $options['OPT_'.$i.'_'.$j]['KEY']; ?>"><?= $options['OPT_'.$i.'_'.$j]['VALUE']; ?></label>
                    </td>
                    <td class="tright b_right">
                      <select id="<?= $options['OPT_'.$i.'_'.$j]['KEY']; ?>" name="<?= $options['OPT_'.$i.'_'.$j]['KEY']; ?>">
                        <?php
                        for ($k = 0; $k <= 10; $k++) {
                          echo '<option value="'.$k.'"';
                          if(isset($_POST['nb_etageres']) && $_POST['nb_etageres'] == $k) {
                            echo ' selected';
                          } elseif (isset($_SESSION['devis']['nb_etageres']) && $_SESSION['devis']['nb_etageres'] == $k) {
                            echo ' selected';
                          }
                          echo '>'.$k.'.00</option>';
                        }
                        ?>
                      </select> <em><?= $options['OPT_'.$i.'_'.$j]['UNITE']; ?></em>
                    </td>
                    <td class="tright b_right">
                      <?php
                        echo $options['OPT_'.$i.'_'.$j]['PRIX'];
                        if(!is_float($options['OPT_'.$i.'_'.$j]['PRIX'])) echo '.00';
                      ?>
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
                  <?php
                }
              }
            }
          }
          ?>
          <tr>
            <td class="b_top" colspan="4">
              OPT_KEY(GRTITRE_2) BLOC PORTE :
            </td>
          </tr>
          <tr class="b_top">
            <td class="b_right">
              <label for="nb_portes">OPT_KEY(OPT_TITRE_2_1) <b>Bloc porte de cave métallique sur mesure</b>, trois omégas de renfort, aération basse intégrée, serrure trois points A2P*, livrée avec 3 clefs.</label>
            </td>
            <td class="tright b_right">
              <select id="nb_portes" name="nb_portes">
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
              </select> <em>OPT_KEY(OPT_UNITE_2_1) Ens</em>
            </td>
            <td class="tright b_right">
              OPT_KEY(OPT_PRIX_2_1) 990.00
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
              OPT_KEY(GRTITRE_3) DÉBARRAS :
            </td>
          </tr>
          <tr class="b_top b_bottom">
            <td class="b_right">
              <label for="debarras">OPT_VALUE(OPT_TITRE_3_1) <b>Effets personnels à débarrasser :</b> Tri, mise en sacs, évacuation à dos d'homme et transport en déchetterie ECO-TRI.</label>
            </td>
            <td class="tright b_right">
              <select id="debarras" name="debarras">
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
              </select> <em>OPT_KEY(OPT_UNITE_3_1) M3</em>
            </td>
            <td class="tright b_right">
              OPT_KEY(OPT_PRIX_3_1) 275.00
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
                if(!is_float($totalAjoutTVA)) echo '.00';

              } elseif(isset($_SESSION['devis']['totalAjoutTVA'])) {

                echo $_SESSION['devis']['totalAjoutTVA'];
                if(!is_float($_SESSION['devis']['totalAjoutTVA'])) echo '.00';

              } else {

                echo '0.00';

              }
              ?> €
            </td>
          </tr>
          <tr>
            <td colspan="2" class="tright">
              <b>Montant TTC</b>
            </td>
            <td colspan="2" class="tright">
              <b><?php if(isset($totalTTC)) {

                echo $totalTTC;
                if(!is_float($totalTTC)) echo '.00';

              } elseif(isset($_SESSION['devis']['totalTTC'])) {

                echo $_SESSION['devis']['totalTTC'];
                if(!is_float($_SESSION['devis']['totalTTC'])) echo '.00';

              } else {

                echo '0.00';

              }
              ?> €</b>
            </td>
          </tr>
        </tbody>
      </table>
      <input type="submit" name="devis" value="<?= $msg['VALID_DEVIS']; ?>">
    </form>
    <?php if(isset($_SESSION['devis'])){ ?>
      <div class="row">
        <div class="span12" data-motopress-type="static" data-motopress-static-file="static/static-title.php">
          <section class="title-section">
            <h1 class="title-header"><?= $msg['DMD_RDV_TITLE']; ?></h1>
         </section>
        </div>
      </div>
      <form class="devis" action="#devis" method="post">
        <input type="submit" name="demande_rdv" value="<?= $msg['DMD_RDV_CTA']; ?>">
      </form>
    <?php } ?>
  </div>
</div>
<?php

  if($_SERVER['SERVER_NAME'] != 'localhost') get_footer();

?>
