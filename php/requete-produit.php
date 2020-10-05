<?php

$id = $_GET['cache'];

  try {

    $requetePreparee = $dbh->prepare("
    SELECT
      *
    FROM
      produit
    WHERE
      id_produit = :id
    ");

    $requetePreparee -> bindParam(':id', $id);
    $requetePreparee -> execute();
    $resultats = $requetePreparee->fetchAll();

    foreach ($resultats as $value) {
      ?>
        <hr>
        <div class="articleproduit">
          <h3 class="titreproduit"><?php echo $value['titre_produit']; ?></h3>
          <div class="divproduit">
            <img src="<?= $value['img_produit']; ?>">
            <p>
              <?= $value['description_produit'] ?>
              <br>
              <br>
              <span style="color:white; font-weight:bold; font-size:2rem;"><?= $value['prix_produit'].'€'; ?></span>
            </p>
          </div>
          <a href="#" class="myButton">Ajouter au panier</a>
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
