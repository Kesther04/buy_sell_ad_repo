<?php

    $date = date("d/m/Y");
    $day = date("d");
    $month = date("m");
    $year = date("Y");

    if ($dow['date'] == $date) {
        echo "Registered Today";
    }
    elseif ($day == $dlet+1 AND $month == $mlet AND $year == $ylet) {
        $minus = $day-$dlet;
        echo $minus." day";
    }
    elseif ($day >= $dlet  AND $month == $mlet AND $year == $ylet) {
        $minus = $day-$dlet;
        echo $minus." days";
    }
    elseif ($day < $dlet AND $month == $mlet+1 AND $year == $ylet) {
        $bminus = (28 - $dlet) + $day;
        $minus = (29 - $dlet) + $day;
        $mminus = (30 - $dlet) + $day;
        $mmminus = (31 - $dlet) + $day;
        if ($dlet == 30) {
            $dind = (30 - $dlet) + $day;
            echo $dind." day";
        }
        elseif($dlet == 31){
            $dind = (31 - $dlet) + $day;
            echo $dind." day";
        }
        elseif($mlet == 1 OR $mlet == 3 OR $mlet == 5 OR $mlet == 7 OR $mlet == 8 OR $mlet == 10 OR $mlet == 12){
            echo $mmminus." days";
        }
        elseif($mlet == 4 OR $mlet == 6 OR $mlet == 9 OR $mlet == 11){
            echo $mminus." days";
        }
        elseif($mlet == 2){
            echo "About ".$bminus.' - '.$minus.' days';
        }
       
    }else {
        echo $dow['fullDay'];
    }
    
?>


