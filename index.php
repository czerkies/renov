<?php
  include_once 'functions.php';

  var_dump($_POST);

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
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
      </div>
      <form class="devis" action="" method="post">
        <div id="form-group devis_coordonnees">
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
          <input type="text" id="ville" name="ville" title="Ville" placeholder="Ville" value="<?php if(isset($_POST['ville'])) echo $_POST['ville']; ?>" required>
          <?php if(isset($msg['ville'])) echo $msg['ville']; ?>
        </div>
        <div class="form-group">
          <input type="text" id="cp" name="cp" title="Code Postal" placeholder="Code Postal" value="<?php if(isset($_POST['cp'])) echo $_POST['cp']; ?>" required>
          <?php if(isset($msg['cp'])) echo $msg['cp']; ?>
        </div>
        <div class="form-group">
          <input type="text" id="adresse" name="adresse" title="Adresse" placeholder="Adresse" value="<?php if(isset($_POST['adresse'])) echo $_POST['adresse']; ?>" required>
          <?php if(isset($msg['adresse'])) echo $msg['adresse']; ?>
        </div>
        <div class="form-group">
          <input type="tel" id="tel" name="tel" title="Téléphone" placeholder="Téléphone" value="<?php if(isset($_POST['tel'])) echo $_POST['tel']; ?>" required>
          <?php if(isset($msg['tel'])) echo $msg['tel']; ?>
        </div>
        <div class="form-group">
          <input type="email" id="email" name="email" title="E-mail" placeholder="E-mail" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" required>
          <?php if(isset($msg['email'])) echo $msg['email']; ?>
        </div>
        <div id="form-group">
          <input name="surface" id="surface" type="number" min="1" max="9999" value="<?php if(isset($_POST['surface'])) echo $_POST['surface']; ?>" placeholder="Surface de votre cave en mettre carré">
          <?php if(isset($msg['surface'])) echo $msg['surface']; ?>
        </div>
        <table class="talbeau_devis">
          <thead>
            <tr>
              <th class="w_30 tcenter">
                Description
              </th>
              <th class="w_15 tcenter">
                Qte
              </th>
              <th class="w_20 tcenter">
                PU HT
              </th>
              <th class="w_20 tcenter">
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
                    echo '<option value="'.$a.'">'.$a.'</option>';
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
                PRIX
              </td>
              <td class="tright">
                TOTAL
              </td>
            </tr>
            <tr class="b_top">
              <td class="">
                <b>Étagère sur mesure</b>, profondeur 35 cm, posée sur un ensemble de fixation, permettant le réglage en hauteur.
              </td>
              <td class=" tright">
                1.00<br>
                <em>ML</em>
              </td>
              <td class="tright">
                45.00
              </td>
              <td class="tright">
                45.00<br>
                <em>En option</em>
              </td>
            </tr>
            <tr class="b_top">
              <td class="">
                <b>Bloc porte de cave métallique sur mesure</b>, trois omégas de renfort, aération basse intégrée, serrure trois points A2P*, livrée avec 3 clefs.
              </td>
              <td class="tright">
                1.00<br>
                <em>Ens</em>
              </td>
              <td class="tright">
                900.00
              </td>
              <td class="tright">
                900.00<br>
                <em>En option</em>
              </td>
            </tr>
            <tr>
              <td class="">
                La pose de l'ouvrage, conçu en matériaux de construction pour un usage intérieur en milieu humide, répondant à la norme EN 13986, respecte l'aération naturelle de la cave.
              </td>
            </tr>
            <tr>
              <td class="">
                NOTRE OFFRE D'AMÉNAGEMENTS EN OPTION
              </td>
            </tr>
          </tbody>
        </table>
        <div id="form-group devis_checkbox">
        <input type="checkbox" id="option_lumiere" name="option_lumiere" value="option_lumiere" <?php if(isset($_POST['option_lumiere'])) echo 'checked'; ?>><label class="type-checkbox" for="option_lumiere">Option lumiere</label>
        </div>
        <input type="submit" name="devis" value="Estimation de devis">
      </form>
    </div>
    <div>
      <?php if(isset($total)){ ?>
        <?= $total; ?> € TTC.
      <?php } ?>
    </div>
  </body>
</html>
