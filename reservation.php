<?php
session_start();
if (!isset($_SESSION['login'])){
    $_SESSION['erreur'] = "Erreur de Connexion";
    header('location: index.php');
}
echo $_SESSION['titre'];
?>