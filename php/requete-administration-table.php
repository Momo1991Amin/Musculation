<?php

  try {

    $requetePreparee = $dbh->prepare("
    SELECT
      *
    FROM
      produit
    WHERE
      id_categorie_produit = 1
    ");

    $requetePreparee -> execute();
    $resultats = $requetePreparee->fetchAll();

    foreach ($resultats as $value) {
      ?>
        <tr>
          <td><a href="produit.php?cache=<?= $value['id_produit']?>"><?= $value['titre_produit']; ?></a></td>
          <td><?= $value['prix_produit'].'€'; ?></td>
          <td><?= mb_substr($value['description_produit'],0,100).'[...]'; ?></td>
          <td>
            <form action="editer-produit.php" method="get">
                <input type="hidden" name="editer-produit" value="<?php echo $value['id_produit']; ?> ">
                <button type="submit" class="but-edit buttt"><i class='fas fa-pencil-alt'></i></button>
            </form>
            <form action="supprimer-produit.php" method="get">
              <input type="hidden" name="supprimer-produit" value="<?php echo $value['id_produit']; ?> ">
              <button type="submit" class="but-sup buttt"><i class="fas fa-times"></i></button>
            </form>
          </td>
        </tr>
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
