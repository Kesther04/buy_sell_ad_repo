<?php

    $day = date("d");
    $mon = date("m");
    $year = date("Y");
    $date = date("d/m/Y");
    $bhr = date("h");
    $min = date("i");
    $sec = date("s");
    $an = date(".a");
    if ($bhr == 11 AND $an == '.am') {
        $hr = $bhr + 1;
        $a = '.pm';
        $time = date("$hr:i:s").'.pm';
    }
    elseif ($bhr == 11 AND $an == '.pm') {
        $hr = $bhr + 1;
        $a = '.am';
        $time = date("$hr:i:s").'.am';
    }
    elseif ($bhr == 12 ) {
        $a = date(".a");
        $hr = 1;
        $time = date("$hr:i:s.a");   
    }else {
        $hr = $bhr + 1;
        $time = date("$hr:i:s.a");
        $a = date(".a");
    }

    

    if ($row['date'] == $date AND $row['time'] == $time) {
        echo "Just Now";
    }
    elseif ($date == $row['date'] AND $sec > $sret AND $min == $mret AND $hr == $hret AND $a == $apm ) {
        $minus = $sec - $sret;
        echo $minus." Seconds Ago";
    }
    elseif ($date == $row['date']  AND $min >= $mret AND $hr == $hret AND $a == $apm ) {
        $minus = $min - $mret;
        echo $minus." Minutes Ago";
    }
    elseif ($date == $row['date']  AND $hr == $hret+1 AND $a == $apm ) {
        $minus = $hr - $hret;
        echo $minus." Hour Ago";
    }
    elseif ($date == $row['date']  AND $hr >= $hret AND $a == $apm ) {
        $minus = $hr - $hret;
        echo $minus." Hours Ago";
    }
    elseif ($date == $row['date'] AND $hr == $hret AND $a !== $apm ) {
        echo " 12 Hours Ago";
    }
    elseif ($date == $row['date'] AND $hr > $hret AND $a !== $apm ) {
        $minus = $hr - $hret;
        $mminus = $minus+12;
        echo $mminus." Hours Ago";
    }
    elseif ($date == $row['date'] AND $hr < $hret AND $a !== $apm ) {
        $minus = $hret - $hr;
        $mminus = 12 - $minus;
        echo $mminus." Hours Ago";
    }
    elseif ($day == $ddet+1 AND $hr > $hret AND $a !== $apm AND $mon == $mdet AND $year == $ydet ) {
        $minus = $hr - $hret;
        $mminus = $minus+12;
        echo $mminus." Hours Ago";
    }
    elseif ($day == $ddet+1 AND $mon == $mdet AND $year == $ydet ) {
        $minus = $day - $ddet;
        echo $minus." Day Ago";
    }
    elseif ($day > $ddet AND $day < $ddet + 7 AND $mon == $mdet AND $year == $ydet) {
        $minus = $day - $ddet;
        echo $minus." Days Ago";
    }
    elseif ($day == $ddet+7 AND $mon == $mdet AND $year == $ydet) {
        
        echo "1 Week Ago";
    }else{
        echo 'on '.$row['fullDay'];
    }
    

    
?>