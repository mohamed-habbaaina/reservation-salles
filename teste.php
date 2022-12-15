<?php
            // Test pour vérifier si la date choisie est un week-end
            // $date = date("w", strtotime($date));
            // if ($date == 0 || $date == 6){
            //     echo "La date choisie est un week-end, veuillez choisir une autre date";
            //     exit();
            // }

            // else if($weekDay == "0" || $weekDay = "6") {
            //     $valid = FALSE;
            //     $err_date = "Nous ne somme pas ouvert le samedi et le dimanche";
            // }

            $date = date('Y-m-d');
            $date = (int)date('w', strtotime("$date"));
             if ($date > 0 && $date < 6):
                echo $date;
            endif;
            
?>
