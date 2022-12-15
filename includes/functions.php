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

