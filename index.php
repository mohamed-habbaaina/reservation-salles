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
<header>
    <nav>
        <div>
            <a href="logo" class="logo">logo</a>
        </div>
        <div class="hamburger">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div >
        <div class="nav-bar">
            <ul>
                <li><a href="">Accueil</a></li>
                <li><a href="">Planing</a></li>
                <li><a href="">Connexion</a></li>
                <li><a href="">Inscription</a></li>
            </ul>
        </div>
    </nav>
</header>
<footer>
    <button class="btn">Lien GITHUB</button>
</footer>
<script>
    humburger = document.querySelector(".hamburger");
    hamburger.onclick = function() {
        navBar = document.querySelector(".nav-bar");
        navBar.classList.toggle("active");
    }
</script>
</body>
</html>