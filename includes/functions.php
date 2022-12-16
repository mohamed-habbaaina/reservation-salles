<?php

// Vérifier que la date n'est pas un week-end.
function DateValid($date){
    $date = (int)date('w', strtotime("$date"));

    if ($date > 0 && $date < 6):
        return true;
    else:
        return false;
    endif;
}

//  Return le jour de la semaine 0 -> Lundi, 4 -> Mercrudi ($i=0 , $i < 5 pour l'affichage).
function DayWeek($date, $jours){
    setlocale(LC_TIME, 'fr_FR');
    $date = date('Y-m-d');
    $date = date('Y-m-d', strtotime("last monday +$jours days", strtotime("$date")));
    return $date;
}