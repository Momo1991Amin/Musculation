<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$dbname = "mohamejsers";
$host = "mohamejsers.mysql.db";
$user = "mohamejsers";
$mdp = "Test12345";

try {
  $dbh = new PDO('mysql:dbname='.$dbname.';host='.$host,$user,$mdp);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $dbh->exec("SET CHARACTER SET utf8");
}
catch (PDOException $e){
  echo '<br> Échec lors de la connexion : ' . $e->getMessage();
}

if(session_status() == PHP_SESSION_NONE){
  session_start();
}
?>
