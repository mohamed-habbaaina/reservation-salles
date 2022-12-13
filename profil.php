<?php
require 'includes/header.php';
if (isset($_SESSION['login'])){ 
    $login = $_SESSION['login'];
    $id = $_SESSION['id'];
    echo "Bienvenue $login, votre id est: $id";
}
?>