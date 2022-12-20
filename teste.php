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

            // $date = date('Y-m-d');
            // $date = (int)date('w', strtotime("$date"));
            //  if ($date > 0 && $date < 6):
            //     echo $date;
            // endif;
            // setlocale(LC_TIME, "fr_FR");
            // $date = date('Y-m-d');
            // $premierJour = strftime("%A - %d/%M/%Y", strtotime("$date")); 
            //   
            // echo "Premier jour de cette semaine est: ", $premierJour;
// echo strtotime('Monday');

//  $i = 3;
// $date = date('Y-m-d');
// $date = date('Y-m-d', strtotime("last monday +$i days", strtotime("$date")));
// echo $date;
// $tab_jours = ['', 'Lundi', 'Mardi', '']
// $date = new DateTime();

// echo $date->format('Y-m-d') . "\n";
$i = 6;
$date = date('Y-m-d');
$date = date('Y-m-d H:i', strtotime("monday this week + $i hours " ,strtotime("$date")));
echo $date;



