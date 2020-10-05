<?php
try {

  $requetePreparee = $dbh->prepare("
  SELECT
  *
  FROM
  produit
  WHERE
  id_categorie_produit = 4
  ");

  $requetePreparee -> execute();
  $resultats = $requetePreparee->fetchAll();

  foreach ($resultats as $value) {
    ?>
    <hr>
    <div class="articleproduit">
      <h3 class="titreproduit"><?php echo $value['titre_produit']; ?></h3>
      <img src="<?= $value['img_produit']; ?>">
      <br>
      <p><?= mb_substr($value['description_produit'],0,100).'[...].' ?></p>
      <form class="" action="produit.php" method="get">
        <input type="hidden" name="cache" value="<?= $value['id_produit']; ?>">
        <input type="submit" class="myButton" value="En savoir plus">
      </form>
    </div>
    <?php
  }
}
catch (PDOException $e) {

  echo "Erreur lors de l'éxécution d'une requête SQL :";

  $errorInfo = $requetePreparee->errorInfo();

  echo "    <div class=\"sqlError\">
  <fieldset>
  <legend>Erreur sql ¯\_(ツ)_/¯</legend>
  <div class=\"content\">" . $errorInfo[2] . "</div>
  </fieldset>
  </div>
  ";

}

?>
