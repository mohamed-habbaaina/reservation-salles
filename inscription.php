<!-- MOHAMED HABBAAINA Le 05/12/2022

-->
<?php
session_start();
//  verifier que l'utilisateur avalider le formulaire. 
if (isset($_POST['submit'])){
    $login = htmlspecialchars(strip_tags(trim($_POST['username'])));
    $password = htmlspecialchars(strip_tags(trim($_POST['password'])));
    $co_password = htmlspecialchars(strip_tags(trim($_POST['co_password'])));

    //  Verifier que l'utilisateur a rempli tous les cases.
    if ($login && $password && $co_password){
        
        // verifier que l'utilisateur a rentrer le meme password. 
        if ($password === $co_password){

            //  cryptage du password
            $password = password_hash($password, PASSWORD_DEFAULT, ['cost' => 12]);

            //  connexion a la base de données.
            require 'includes/connect.php';

            // requette pour recupier les login et pour la verification.
            $req_login = $connection->query("SELECT * FROM `utilisateurs` WHERE login='$login';");
            $login_verif = mysqli_num_rows($req_login);
            if ($login_verif === 0){

                //  ajouter le nouveau utilisateur à la base de données
                $requ_inser = $connection->query("INSERT INTO `utilisateurs`(`login`, `password`) VALUES ('$login', '$password')");
                $_SESSION['login'] = $login;

                // redirection vers la page de connexion.
                header("location:connexion.php");

            } else {
                $err_log = 'Le login n\'est pas disponible, Veuillez le changer !';
            }
        } else {
            $err_pass = 'Veiller rentrer le meme password';
        }

    } else {
        $errs = ' Veiller remplir tous les champs !';
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
    <link rel="stylesheet" href="style/connect.css">
    <title>Inscription</title>
</head>
<body>
<?php include 'includes/header.php' ?>
<main>
    <div class="form">

    <!-- l'affichage des erreurs -->
        <p class="errs"><?php if (isset($errs)){
            echo $errs;
        }
        if (isset($err_pass)){
            echo $err_pass;
        }
        if (isset($err_log)){
            echo $err_log;
        }
        ?></p>
        <form action="#" method="post">
            <h3>Inscription</h3>

            <label for="username">Login</label>
            <input type="text" name="username" placeholder="Entre Votre Login">

            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Entre Votre Password">

            <label for="co-password">Confirmer Password</label>
            <input type="password" name="co_password" placeholder="Confirmer Votre Password">

            <button type="submit" name="submit" class="btn_connect">Valider</button>
        </form>

    </div>
</main>
<?php include 'includes/footer.php' ?>
</body>
</html>