<?php
    //page for date use in system
    
    if (date("d") == 1) {
       $sD = date("d").'st';
    }
    elseif (date("d") == 2)  { $sD = date("d").'nd';}
    elseif (date("d") == 3)  { $sD = date("d").'rd';}
    elseif (date("d") == 21) { $sD = date("d").'st'; }
    elseif (date("d") == 22) { $sD = date("d").'nd'; }
    elseif (date("d") == 23) { $sD = date("d").'rd'; }
    elseif (date("d") == 31) { $sD = date("d").'st'; }
    else {
        $sD = date("d").'th';
    }


    $fullDate = date("D ").$sD.date(" M,Y");
    $date = date("d/m/Y");
    $bhr = date("h");
    $antPer = date("a");
    if ($bhr == 11 AND $antPer == 'am') {
        $hr = $bhr + 1;
        $time = date("$hr:i:s").'.pm';
    }
    elseif ($bhr == 11 AND $antPer == 'pm') {
        $hr = $bhr + 1;
        $time = date("$hr:i:s").'.am';
    }
    elseif ($bhr == 12 ) {
        $hr = 1;
        $time = date("$hr:i:s.a");   
    }else {
        $hr = $bhr + 1;
        $time = date("$hr:i:s.a");
    }
    


?>