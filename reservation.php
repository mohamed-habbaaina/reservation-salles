<?php
session_start();
if (!isset($_SESSION['login'])){
    $_SESSION['erreur'] = "Erreur de Connexion";
    header('location: index.php');
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    require 'includes/connect.php';
    $requ_sel_id = $connection->query("SELECT * FROM utilisateurs INNER JOIN reservations ON utilisateurs.id = reservations.id_utilisateur WHERE reservations.id='$id';");
    $requ_fetch_id = $requ_sel_id->fetch_assoc();
    // var_dump($requ_fetch_id);
$debut = date('D d/m/Y H:i', strtotime($requ_fetch_id['debut']));
$fin = date('D d/m/Y H:i', strtotime($requ_fetch_id['fin']));
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/reserv.css">

    <title>Reservation</title>
</head>
<body>
    <?php
    require 'includes/header.php';
    ?>
    <main>
        <div>
            <h2>La reservation :</h2>
            <table class="tab_res">
                <tbody>
                    <tr>
                        <td><?= 'Login'; ?></td>
                        <td><?= $requ_fetch_id['login']; ?></td>
                    </tr>
                    <tr>
                        <td><?= 'Titre'; ?></td>
                        <td><?= $requ_fetch_id['titre']; ?></td>
                    </tr>
                    <tr>
                        <td><?= 'Debut'; ?></td>
                        <td><?= $debut; ?></td>
                    </tr>
                    <tr>
                        <td><?= 'Fin'; ?></td>
                        <td><?= $fin; ?></td>
                    </tr>
                    <tr>
                        <td><?= 'Description'; ?></td>
                        <td><?= $requ_fetch_id['description']; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>