<?php

$id = $_GET['editer-produit'];

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
  <form class="formmm" action="php/requete-editer.php" method="get">
    <fieldset>
      <legend style="color:white">Formulaire de modification de produit</legend>
      <label>Description du produit *</label>
      <br>
      <textarea rows="8" cols="80" required name="description"><?php echo $value['description_produit'] ?></textarea>
      <br>
      <label>Titre du produit *</label>
      <br>
      <input type="text" name="titre" required class="taille-input" value="<?php echo $value['titre_produit'] ?>">
      <br>
      <label>Prix du produit *</label>
      <br>
      <input type="text" name="prix" required class="taille-input" value="<?php echo $value['prix_produit'] ?>">
      <br>
      <label>Lien de l'image du produit</label>
      <br>
      <input type="text" name="lien" class="taille-input" value='<?php echo $value['img_produit'] ?>'>
      <br>
      <label>Catégorie du produit *</label>
      <br>
      <select class="" name="categorie">
        <?php include 'requete-ajouter-categorie.php' ?>
      </select>
      <br>
      <input type="hidden" name="cache" value="<?php echo $id ?> ">
      <input type="submit" value="Envoyer">
      <p style="font-size:0.6rem; text-align:right">Les champs suivis de * sont obligatoire.</p>
    </fieldset>
  </form>
  <?php
}
?>
