<?php
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
        $titre = addslashes(htmlspecialchars($_GET['titre']));
        $heure_d = htmlspecialchars(strip_tags(trim($_GET['heure_d'])));
        $heure_f = htmlspecialchars(strip_tags(trim($_GET['heure_f'])));
        $date = htmlspecialchars(strip_tags(trim($_GET['date'])));
        $description = addslashes(htmlspecialchars($_GET['description']));


        // Vérifier que la date n'est pas un week-end.

        include 'includes/functions.php';
        if (DateValid($date)):

            //  création date debut et fin.
            $debut = $date . ' ' . $_GET['heure_d'];
            $fin = $date . ' ' . $_GET['heure_f'];


            $debut_veri_input = strtotime($debut);
            $fin_veri_input = strtotime($fin);

            //  connexion DB
            require 'includes/connect.php';

            $requ_select = $connection->query("SELECT `debut`, `fin` FROM `reservations`;" );
            
            $dispo = true;  // creation dune variable pour check la disponibilité.
            while ($assoc = $requ_select->fetch_assoc()):
                // var_dump($assoc);

                //  Transformé les dates de string à int méthode "strtotime" pour pouvoirs comparé.
                $debut_veri_db = strtotime($assoc['debut']);
                $fin_veri_db = strtotime($assoc['fin']);

                // Vérification que le créneau est disponible 
                //  les deux dates de début et de fin n'est pas dans l'intervalle de la réservation
                //  + les créneaux reservé n'est pas dans le crénau demandé(premirère condition). 
                if (($debut_veri_input <= $debut_veri_db && $fin_veri_input >= $fin_veri_db) || ($debut_veri_input > $debut_veri_db && $debut_veri_input < $fin_veri_db) || ($fin_veri_input > $debut_veri_db && $fin_veri_input < $fin_veri_db)):
                     $dispo = false;
                     $err_occup = 'creneau deja reservé';   //  à afficher
                endif;

            endwhile;
                if ($dispo === true):
                    $requ_inser = $connection->query("INSERT INTO `reservations` (`titre`, `description`, `debut`, `fin`, `id_utilisateur`) VALUES ('$titre', '$description', '$debut', '$fin', '$id');");
                    $mess_inser = "Votre réservation est bien enregistrée le $date, entre {$_GET['heure_d']} et {$_GET['heure_f']} !";
                endif;
            else    : $datevalide = 'la date n\'est pas valide (La Salle est ouverte du Lundi à Vendredi) !';
            endif;
        endif;
    endif;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/reserv-form.css">
    <title>Reservation</title>
</head>
<body>
<?php require 'includes/header.php'; ?>
<main>
    <div class="form">
        <form action="#" method="GET">
            <p class="errs">
            <?php   // L'affichage des erreurs.
            if (isset($mess_inser)):
                echo $mess_inser;
            endif;
            if (isset($err_occup)):
                echo $err_occup;
            endif;
            if (isset($datevalide)):
                echo $datevalide;
            endif;
            ?></p>
            <h1>Formulaire de réservation</h1>
            <p>Utilisateur: <?= $login; ?></p>

            <label for="titre">Titre :</label>
            <input type="text" name="titre" required>
            
            <!-- time min et max pour n'afficher que les heures d'ouverture. -->
            <label for="heure_d">Heure de début :</label>
            <input type="time" min="08:00" max="18:00" step="3600" name="heure_d" required>

            <label for="heure_f">Heure de fin :</label>
            <input type="time" min="09:00" max="19:00" step="3600" name="heure_f" required>

            <!-- donnée la possibiliter pour un mois de réservation seulement -->
            <label for="date">Date :</label>
            <input type="date" name="date"  min="<?= date('Y-m-d' , strtotime("-14 day", time())); ?>" value="<?= date('Y-m-d'); ?>" max="<?= date('Y-m-d', strtotime("+14 day", time())); ?>" value="<?= date('Y-m-d'); ?>" required>

            <label for="description">Description</label>
            <input type="textarea" name="description" required>

            <input type="submit" name="submit" value="Valider" class="btn">
        </form>
    </div>
</main>
<?php require 'includes/footer.php' ?>
</body>
</html>