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
      <div id="form-group devis_checkbox">
      <input type="checkbox" id="option_lumiere" name="option_lumiere" value="option_lumiere" <?php if(isset($_POST['option_lumiere'])) echo 'checked'; ?>><label class="type-checkbox" for="option_lumiere">Option lumiere</label>
      </div>
      <input type="submit" name="devis" value="Estimation de devis">
    </form>
    <div>
      <?php if(isset($total)){ ?>
      <?= $total; ?> € TTC.
      <?php } ?>
    </div>
  </body>
</html>
