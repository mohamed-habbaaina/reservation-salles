<?php
session_start();
$days = ['Samedi', 'Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi'];
if (!isset($_SESSION['login'])){
    $_SESSION['erreur'] = "Erreur de Connexion";
    header('location: index.php');
}
// if (isset($_SESSION['login'])){ 
//     $login = $_SESSION['login'];
//     $id = $_SESSION['id'];

    //include 'includes/connect.php';
    include 'includes/functions.php';

    // Requette pour recupérer la data.

    // $requ_selec_all = $connection->query("SELECT login, titre, debut, fin FROM utilisateurs INNER JOIN reservations ON utilisateurs.id = reservations.id_utilisateur;");

    // while ($requ_fetch_ass = $requ_selec_all->fetch_assoc()):
    //     echo '<pre>';
    //     print_r($requ_fetch_ass);
    //     echo '</pre>';
    // endwhile;
    // die(); 
    $date = date('Y-m-d');
    // for ($i=0; $i < 5 ; $i++) { //  Affichage du planning.
    //     echo DayWeek($date, $i) . '<br>';
    //     for ($j=0; $j < 11; $j++) {
    //         echo ($j+8) . ':' . '00' . ' ';

    //     }
    // }
    // die;
// }
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
        <tr>
            <th>heures\dates</th>
            <?php
            foreach ($days as $day) {?>
            <th><?= $day;?></th>
            <?php }?>
        </tr>
    </thead>
    <tbody>
            <?php
                for ($h= 8; $h < 19; $h++){

                echo '<tr><td>' . "$h H" . '-' . $h+1 . ' H' . '</td>';
                
                for ($i=0; $i < 7; $i++){
                    echo '<td>' . date("Y-m-d", mktime($h, 0, 0, 0, 0, 2022)) . '</td>';
                }
            ?>
        </tr>
        <?php }?>

    </tbody>

</table>

</main>
<?php require 'includes/footer.php' ?>
</body>
</html>