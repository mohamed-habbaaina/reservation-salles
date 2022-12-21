<?php
            $servername = 'localhost';
            $username = 'root';
            $password_b = '';
            $database = 'reservationsalles';

            // Connexion plesk
            // $servername = 'localhost:3306';
            // $username = 'reserv_salles';
            // $password_b = '650k&Uxu0';
            // $database = 'mohamed-habbaaina_reservationsalles';

            
            // Ce connecter a la base de données "utilisateurs"
            $connection = new mysqli($servername, $username, $password_b, $database) or die('Erreur');
?>