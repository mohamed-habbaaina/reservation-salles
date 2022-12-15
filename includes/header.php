    <?php
    if (isset($_SESSION['login'])) : ?>
    <header>
        <nav class="navbar">
            <a href="index.php" class="logo">LOGO</a>
                <ul class="nav-links">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="planing.php">Planing</a></li>
                    <li><a href="profil.php">Profil</a></li>
                    <button class="btn"><li><a href="reservation-form.php">Reservation</a></li></button>
                    <button class="btn"><li><a href="includes/decconect.php">Déconnexion</a></li></button>
                </ul>
                <div class="burger">
                    <div class="line1"></div>
                    <div class="line2"></div>
                    <div class="line3"></div>
                </div>
        </nav>
    </header> <?php  else : ?>
        <header>
        <nav class="navbar">
            <a href="index.php" class="logo">LOGO</a>
                <ul class="nav-links">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="planing.php">Planing</a></li>
                    <button class="btn"><li><a href="connexion.php">Connexion</a></li></button>
                    <button class="btn"><li><a href="inscription.php">Inscription</a></li></button>
                </ul>
                <div class="burger">
                    <div class="line1"></div>
                    <div class="line2"></div>
                    <div class="line3"></div>
                </div>
        </nav>
    </header> <?php endif; ?>