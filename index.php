<?php
  include_once 'functions.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Renov devis</title>
  </head>
  <body>
    <form class="" action="" method="post">
      <div id="form-group">
        <input name="surface" type="number" min="1" max="9999" value="<?php if(isset($_POST['surface'])) echo $_POST['surface']; ?>" placeholder="Surface de votre cave en mettre carré">
      </div>
      <div id="form-group">
      <input type="checkbox" id="option_lumiere" name="option_lumiere" value="option_lumiere" <?php if(isset($_POST['option_lumiere'])) echo 'checked'; ?>><label for="option_lumiere">Option lumiere</label>
      </div>
      <input type="submit" name="devis" value="Estimation de devis">
    </form>
    <div>
      <?php if(isset($total)) echo $total; ?>
    </div>
  </body>
</html>
