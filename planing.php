<?php
session_start();
if (!isset($_SESSION['login'])){
    $_SESSION['erreur'] = "Erreur de Connexion";
    header('location: index.php');
}
if (isset($_SESSION['login'])){ 
    $login = $_SESSION['login'];
    $id = $_SESSION['id'];

    include 'includes/functions.php';

    for ($i=0; $i < 5 ; $i++) { //  Affichage du planning.

        for ($j=0; $j < 11; $j++) { 


        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Le Planning</title>
</head>
<body>
<?php require 'includes/header.php'; ?>
<main class="main_index">

<table>
    <thead>
        <th></th>
    </thead>
    <tbody>
        <tr>
            <td>

            </td>
        </tr>
    </tbody>
</table>

</main>
<?php require 'includes/footer.php' ?>
</body>
</html>