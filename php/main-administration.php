<?php
if(session_status() == PHP_SESSION_NONE){
  session_start();
}
if(!isset($_SESSION['auth'])){
  echo "Vous n'avez pas l'autorisation d'accéder à cette page";
  die();
}
if($_SESSION['auth']['username_client'] != "admin"){
  echo "Vous n'avez pas l'autorisation d'accéder à cette page";
  die();
}
?>
<main class="administration container">
  <div class="page">
    <p>Administration</p>
  </div>
  <div class="produitt">
    <a href="ajouter-produit.php" style="font-size:1.4rem; text-decoration:underline; color:white">Ajouter un produit</a>
    <h2>TABLE</h2>
    <table>
      <thead>
        <tr>
          <th>Titre du produit</th>
          <th>Prix du produit</th>
          <th>Description du produit</th>
        </tr>
      </thead>
      <tbody>
        <?php include 'requete-administration-table.php' ?>
      </tbody>
    </table>
    <h2>MUSCULATION</h2>
    <table>
      <thead>
        <tr>
          <th>Titre du produit</th>
          <th>Prix du produit</th>
          <th>Description du produit</th>
        </tr>
      </thead>
      <tbody>
        <?php include 'requete-administration-musculation.php' ?>
      </tbody>
    </table>
    <h2>POIGNÉES</h2>
    <table>
      <thead>
        <tr>
          <th>Titre du produit</th>
          <th>Prix du produit</th>
          <th>Description du produit</th>
        </tr>
      </thead>
      <tbody>
        <?php include 'requete-administration-poignees.php' ?>
      </tbody>
    </table>
    <h2>ACCESSOIRES</h2>
    <table>
      <thead>
        <tr>
          <th>Titre du produit</th>
          <th>Prix du produit</th>
          <th>Description du produit</th>
        </tr>
      </thead>
      <tbody>
        <?php include 'requete-administration-accessoire.php' ?>
      </tbody>
    </table>
  </div>
</main>
