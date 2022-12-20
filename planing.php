<?php
session_start();
$days = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
if (!isset($_SESSION['login'])){
    $_SESSION['erreur'] = "Erreur de Connexion";
    header('location: index.php');
}
//     $login = $_SESSION['login'];
//     $id = $_SESSION['id'];

    include 'includes/connect.php';
    include 'includes/functions.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/planning.css">
    <title>Le Planning</title>
</head>
<body>
<?php require 'includes/header.php'; ?>
<main>
<?php
$week = 'this';
?>
<div>
    <div>
        <table methode= "get" class="tab_btn" >
            <button type="submit" name="last">Last</button>
            <button type="submit" name="reset">Reset</button>
            <button type="submit" name="next">Next</button>
        </table>
    </div>
    <?php
    // if (isset($_GET['submit'])):
        if (isset($_GET['last'])):
            $week = 'last';
        endif;
        if (isset($_GET['next'])):
            $week = 'next';
        endif;
        if (isset($_GET['reset'])):
            $week = 'this';
        endif;
    // endif;
    ?>
        <!-- L'affichage du planning -->
    <table class="tab_plani">
        <thead>
            <tr>
                <th>heures\dates</th>
                <?php
                //  Les jours
                foreach ($days as $day) {?>
                <th><?= $day;?></th>
                <?php }?>
            </tr>
        </thead>
        <tbody>
                <?php

                    //  les créneaux entre 08 h et 19 h.
                    for ($h= 8; $h < 19; $h++){

                        //  recupérer la date du lundi de cette semaine '$week' pour l'affichage de la semaine prochaine '$h' pour les créneaux horaires.
                        $date = date('Y-m-d H:i', strtotime("monday $week week + $h hours "));

                        //  Affichage des heures
                    echo '<tr><td>' . "$h H" . '-' . $h+1 . ' H' . '</td>';
                    
                        //  incrémenter les jours de la semaine 
                    for ($i=0; $i < 5; $i++){

                        //  requette pour récupérer la data de la DB WHERE le meme créneau horaire.
                        $requ_selec_ass = $connection->query("SELECT * FROM utilisateurs INNER JOIN reservations ON utilisateurs.id = reservations.id_utilisateur WHERE debut='$date';");

                        $requ_fetch_ass = $requ_selec_ass->fetch_assoc();

                        //  If la DB n'est pas vide on affiche la reservation, sinon on affiche 'Libre'.
                        if (isset($requ_fetch_ass['debut'])){
                            // $id = $requ_fetch_ass['id'];
                            // echo $id;
                            echo '<td>' . '<a href="reservation.php?id=' . $requ_fetch_ass['id'] . '">' . $requ_fetch_ass['login'] . '<br>' . $requ_fetch_ass['titre'] . '</a>' . '</td>';
                            // $_SESSION['debut'] = $requ_fetch_ass['titre'];
                        } else {
                            echo '<td>'. 'Libre' . '</td>';}

                            //  incrémenter la date d'un jour.
                        $date = date('Y-m-d H:i', strtotime("$date +1 days "));
                    } 

                ?>

                <!-- Fermé pour les weekend -->
                <td>Fermé</td>
                <td>Fermé</td>
            </tr>
            <?php }?>

        </tbody>

    </table>
</div>
</main>
<?php require 'includes/footer.php' ?>
</body>
</html>