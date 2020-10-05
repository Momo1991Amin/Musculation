<?php

if(session_status() == PHP_SESSION_NONE){
  session_start();
}
if(!isset($_SESSION['auth'])){
  header('Location: connexion.php');
}
unset($_SESSION['auth']);
header('Location: connexion.php');


?>
