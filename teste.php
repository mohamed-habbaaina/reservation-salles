<?php
            // Test pour vérifier si la date choisie est un week-end
            $date = date("w", strtotime($date));
            if ($date == 0 || $date == 6){
                echo "La date choisie est un week-end, veuillez choisir une autre date";
                exit();
            }

select debut fin where $deb <= debut && $fin >= fin
?>
