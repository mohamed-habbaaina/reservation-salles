<?php
session_start();
if (isset($_SESSION['login'])){ 
    $login = $_SESSION['login'];
    $id = $_SESSION['id'];
    echo "Bienvenue $login, votre id est: $id";

    $_SESSION['login'] = $login;
    $_SESSION['id'] = $id;

}
if (isset($_SESSION['erreur'])){
    $err_conn = $_SESSION['erreur'];
    echo $err_conn;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Réservation de salles</title>
</head>
<body>
<?php require 'includes/header.php'; ?>
<main class="main_index">
<?php
if (isset($_SESSION['change'])):
    echo $_SESSION['change'];
endif;
?>
</main>
<?php require 'includes/footer.php' ?>
</body>
</html>