<?php
use LDAP\Connection;
session_start();
if (!isset($_SESSION['login'])){
    $_SESSION['erreur'] = "Erreur de Connexion";
    header('location: index.php');
}
$id = $_SESSION['id'];
$login = $_SESSION['login'];
if (isset($_GET['submit'])):
    if ($_GET['titre'] && $_GET['heure_d'] && $_GET['heure_f'] && $_GET['date'] && $_GET['description']):

        //  recupération des données et sécurisation
        $titre = htmlspecialchars(strip_tags(trim($_GET['titre'])));
        $heure_d = htmlspecialchars(strip_tags(trim($_GET['heure_d'])));
        $heure_f = htmlspecialchars(strip_tags(trim($_GET['heure_f'])));
        $date = htmlspecialchars(strip_tags(trim($_GET['date'])));
        $description = htmlspecialchars(strip_tags(trim($_GET['description'])));

        // if ($_GET['heure_d'] >= 08 && $_GET['heure_f'] <= 19):

        // var_dump($_GET);
        //  création date debut et fin.
        $debut = $date . ' ' . $_GET['heure_d'];
        $fin = $date . ' ' . $_GET['heure_f'];

        //  connexion DB
        require 'includes/connect.php';

        $requ_select = $connection->query("SELECT `debut`, `fin` FROM `reservations`");

        $rst_select = $requ_select->fetch_all();
        var_dump($rst_select);

        //     if ($debut >= $fin):
        //         echo 'supper';
        //     else: echo 'infer';
        // endif;


        // var_dump($debut);
        // echo '<br>';
        // var_dump($fin);

        //$requ_inser = $connection->query("INSERT INTO `reservations` (`titre`, `description`, `debut`, `fin`, `id_utilisateur`) VALUES ('$titre', '$description', '$debut', '$fin', '$id');");
         echo 'connect';
            else: $err_tim = 'ouverture entre 8 et 19h';
        endif;
    else:
        $err_rempl = 'remplire';
    endif;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Reservation</title>
</head>
<body>
<?php require 'includes/header.php'; ?>
<main>
    <div class="form">
        <form action="#" method="GET">
            <p class="errs"><?php if (isset($err_rempl)):
                echo $err_rempl;
            endif;
            if (isset($err_tim)):
                echo $err_tim;
            endif;  
            ?></p>
            <h1>Formulaire de réservation</h1>
            <p>Utilisateur: <?= $login; ?></p>

            <label for="titre">Titre :</label>
            <input type="text" name="titre" required>

            <label for="heure_d">Heure de début :</label>
            <input type="time" min="08:00" max="19:00" step="3600" name="heure_d" required>

            <label for="heure_f">Heure de fin :</label>
            <input type="time" min="08:00" max="19:00" step="3600" name="heure_f" required>

            <label for="date">Date :</label>
            <input type="date" name="date" required>

            <label for="description">Description</label>
            <input type="textarea" name="description" required>

            <input type="submit" name="submit" value="Valider" class="btn">
        </form>
    </div>
</main>
<?php require 'includes/footer.php' ?>
</body>
</html>