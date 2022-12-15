<?php
session_start();
//  redirection page HOME si pas connecter.
if (!isset($_SESSION['login'])) {
    die ('Connexion Pas Autorisé !');
}
$login = $_SESSION['login'];

if (isset($_POST['submit'])){
    if (isset($_POST['nw_login']) && $_POST['password'] && $_POST['con_password']){
        if ($_POST['password'] === $_POST['con_password']){

            //  Securisation des inputes 
            $nw_login = htmlspecialchars(strip_tags(trim($_POST['nw_login'])));
            $password = htmlspecialchars(strip_tags(trim($_POST['password'])));

            //hash password
            $password = password_hash($password, PASSWORD_DEFAULT, ['cost' => 12]);

            require 'includes/connect.php';  // connexion BD.

            $requ_verif = $connection->query("SELECT * FROM `utilisateurs` WHERE (login='$nw_login') OR (login='$login');");

           $rows =mysqli_num_rows($requ_verif); //  check BD pour l'empêché de prendre un login existant 

           if ($rows === 1){

            // Requette update
            $requ_update = $connection->query("UPDATE `utilisateurs` SET `login`='$nw_login', `password`='$password' WHERE login='$login';");
            echo 'Vos Modifications Ont Bien été Enregistrées !';
                // $_SESSION['change'] = 'vos modifications ont été pris en compte !';
                // header("location:commentaires.php"); // redirection vers la page commentaires. 
            } else {
                $err_logi = 'Le login n\'est pas disponible, Veuillez le changer !';
            }



        } else {
            $err_pass = 'Veiller rentrer le meme password';
        }



    } else{
        $err_don = 'Veiller remplir tous les champs !';
    }
    
    
    
}


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/connection.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
</head>
<body>
<?php require 'includes/header.php'; ?>
<main style="min-height: 85vh;">
    <div class="form">

        <p class="errs"><?php if (isset($err_don)){
            echo $err_don;
        }
        if (isset($err_pass)){
            echo $err_pass;
        }
        if (isset($err_logi)){
            echo $err_logi;
        }
        ?></p>
        <h3>Modifier Vos Informations</h3>
        <form action="#" method="post">
        <label for="nw_login">Login</label>
        <input type="text" name="nw_login" value="<?php echo $login ?>">

        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Rentre Votre Password">

        <label for="con_password">Confermer Votre Password</label>
        <input type="password" name="con_password" placeholder="Cnfermer Votre Password">

        <button type="submit" name="submit">Valider</button>

        </form>
    </div>
<?php require 'includes/footer.php'; ?>
</main>
</body>
</html>