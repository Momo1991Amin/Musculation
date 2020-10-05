<main class="administration container">
  <div class="page">
    <p>Ajouter un produit</p>
  </div>
  <form class="formmm" action="php/requete-ajouter.php" method="get">
    <fieldset>
      <legend style="color:white">Formulaire d'ajout de produit</legend>
      <label>Description du produit *</label>
      <br>
      <textarea rows="8" cols="80" required name="description"></textarea>
      <br>
      <label>Titre du produit *</label>
      <br>
      <input type="text" name="titre" required class="taille-input">
      <br>
      <label>Prix du produit *</label>
      <br>
      <input type="text" name="prix" required class="taille-input">
      <br>
      <label>Lien de l'image du produit</label>
      <br>
      <input type="text" name="lien" class="taille-input">
      <br>
      <label>Catégorie du produit *</label>
      <br>
      <select class="" name="categorie">
        <?php include 'requete-ajouter-categorie.php' ?>
      </select>
      <br>
      <input type="submit" value="Envoyer">
      <p style="font-size:0.6rem; text-align:right">Les champs suivis de * sont obligatoire.</p>
    </fieldset>
  </form>
</main>
