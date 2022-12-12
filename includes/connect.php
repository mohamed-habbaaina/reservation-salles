<?php
            $servername = 'localhost';
            $username = 'root';
            $password_b = '';
            $database = 'moduleconnexion';

            // Connexion plesk
            // $servername = 'localhost:3306';
            // $username = 'modul_connexion';
            // $password_b = 'Mmodul1234';
            // $database = 'mohamed-habbaaina_moduleconnexion';

            
            // Ce connecter a la base de données "utilisateurs"
            $connection = new mysqli($servername, $username, $password_b, $database) or die('Erreur');
?>