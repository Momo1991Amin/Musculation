<?php
  $requetePreparee = $dbh->prepare("
  SELECT
  *
  FROM categorie
  ");

  $requetePreparee -> execute();
  $categories = $requetePreparee->fetchAll();

  foreach ($categories as $categorie) {

    $hey = "";
    if($categorie['id_categorie'] == $value['id_categorie_produit'])
      $hey =  "selected";
    ?>
    <option value="<?php echo $categorie['id_categorie']; ?>" <?= $hey; ?>>
       <?php
         echo $categorie['nom_categorie'];
       ?>
    </option>
    <?php
  }

?>
