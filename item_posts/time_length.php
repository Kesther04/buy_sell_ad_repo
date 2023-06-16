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
        }else {
            echo "About ".$minus.' - '.$mmminus.' days';
        }
       
    }else {
        echo $dow['fullDay'];
    }
    
    // elseif ($day < $dlet AND $month == $mlet+2 AND $year == $ylet ) {
    //     $myinus  = $month - ($mlet+1);
        
    //     if ($dlet == 30) {
           
    //         echo $myinus.' month ago';
    //     }
    //     elseif($dlet == 31){
    //         $dind = (31 - $dlet) + $day;
    //         echo $myinus.' month ago';
    //     }else {
    //         echo $myinus." month ago";
    //     }
       
    // }
    // elseif ($day < $dlet AND $month >= $mlet AND $year == $ylet ) {
    //     $myinus  = $month - ($mlet+1);
        
    //     if ($dlet == 30) {
           
    //         echo $myinus.' months ago';
    //     }
    //     elseif($dlet == 31){
    //         $dind = (31 - $dlet) + $day;
    //         echo $myinus.' months ago';
    //     }else {
    //         echo $myinus." months ago";
    //     }
       
    // }
    // elseif ($month == $mlet+1 AND $year == $ylet) {
    //     $minus = $month - $mlet;
    //     echo $minus." month";
    // }
    // elseif ($month >= $mlet AND $year == $ylet) {
    //     $minus = $month - $mlet;
    //     echo $minus." months";
    // }
    // elseif ($year == $ylet+1 AND $mlet == 12 AND $month == 1 ) {
    //     $minus = (12 - $mlet) + $month;
    //     echo $minus." month";
    // }
    // elseif ($year == $ylet+1 AND $month < $mlet) {
    //     $minus = (12 - $mlet) + $month;
    //     echo $minus." months";
    // }
    // elseif ($year == $ylet+1 AND $month == $mlet ) {
    //     $minus = $year - $ylet;
    //     echo $minus." year";
    // }
    // elseif ($year == $ylet+1 AND $month == $mlet+1) {
    //     $yinus = $year - $ylet;
    //     $minus = (12 - $mlet) + $month;
    //     $mminus = $minus-12;
    //     echo $yinus." year and ".$mminus." month";
    // }
    // elseif ($year == $ylet+1 AND $month > $mlet) {
    //     $yinus = $year - $ylet;
    //     $minus = (12 - $mlet) + $month;
    //     $mminus = $minus-12;
    //     echo $yinus." year and ".$mminus." months";
    // }
    // elseif ($year >= $ylet AND $month == $mlet+1) {
    //     $yinus = $year - $ylet;
    //     $minus = (12 - $mlet) + $month;
    //     $mminus = $minus-12;
    //     echo $yinus." years and ".$mminus." month";
    // }
    // elseif ($year >= $ylet AND $month > $mlet) {
    //     $yinus = $year - $ylet;
    //     $minus = (12 - $mlet) + $month;
    //     $mminus = $minus-12;
    //     echo $yinus." years and ".$mminus." months";
    // }
    // elseif ($year == $ylet+2 AND $month < $mlet) {
    //     $yinus = $year - $ylet;
    //     $minus = (12 - $mlet) + $month;
       
    //     echo "1 year and ".$minus." months";
       
    // }  
    // elseif ($year >= $ylet AND $month < $mlet) {
    //     $yinus = $year - $ylet;
    //     $yyinus = $yinus-1;
    //     $minus = (12 - $mlet) + $month;
       
    //     echo $yyinus." years and ".$minus." months";
       
    // }
    // elseif ($year >= $ylet) {
    //     $minus = $year - $ylet;
    //     echo $minus." years";
    // }  

    
?>


