<?php
if (isset($_POST['submit'])){

    $login = htmlspecialchars(strip_tags(trim($_POST['username'])));
    $password = htmlspecialchars(strip_tags(trim($_POST['password'])));


    if (isset($login) && isset($password)){

        // Connexion a la BD.
        require 'includes/connect.php';

        // requette pour recupérer les données et verifier que l'utilisateur est bien enregistré dans la BD.
        $requ_ver = $connection->query("SELECT `id`, `login`, `password` FROM `utilisateurs` WHERE login='$login'");
        $log_ve = mysqli_num_rows($requ_ver);
;
        if ($log_ve > 0){

            //  verification du passwprd.
            $requ_fetch = $requ_ver->fetch_assoc();
            // var_dump($requ_fetch);
            $password_BD = $requ_fetch['password'];
            // print_r(password_verify($password, $password_BD));
            if (password_verify($password, $password_BD)){

                //  Recuperer le 'id' de l'utilisateur
                $id = $requ_fetch['id'];

                // echo $id . '  ' . "$login";

                // Création des variables global de session
                $_SESSION['login'] = $login;
                $_SESSION['id'] = $id;

                // echo '<br><br><br>' . $_SESSION['login'] . $_SESSION['id'];

                // redirection vers la page 
                header('location: profil.php');
            } else {
                $err_pw_bd = 'Password Incorecte !';
            }

        } else {
            $err_comp = 'Login ou Password incorrecte !';
        }

    } else{
        $err_c = ' Veiller remplir tous les champs !';
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
    <link rel="stylesheet" href="style/connection.css">
    <title>Connexion</title>
</head>
<body>
<?php include 'includes/header.php' ?>
<main>
    <div class="form">

    <!-- l'affichage des erreurs -->
        <p class="errs"><?php
        if (isset($err_c)){
            echo $err_c;
        }
        if (isset($err_comp)){
            echo $err_comp;
        }
        if (isset($err_pw_bd)){
            echo $err_pw_bd;
        }
        ?></p>
        <form action="#" method="post">
            <h3>Connexion</h3>

            <label for="username">Login</label>
            <input type="text" name="username" placeholder="<?php if (isset($login)) {
                echo $login;
            } else {
                echo 'login';} ?>">

            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Entre Votre Password">

            <button type="submit" name="submit">Valider</button>
        </form>

    </div>
</main>
<?php include 'includes/footer.php' ?>
</body>
</html>