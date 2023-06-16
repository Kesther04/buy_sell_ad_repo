<?php

if ($_SERVER['REQUEST_METHOD']=="POST") {
    $icat = str_replace(' ','-',$_POST['icat']);
    $imcat = str_replace(' ','-',$_POST['micat']);
    $fnm = $_POST['fnm'];
    $fpr = $_POST['fpr'];
    require("../../date_la_time.php");

    require("../../class/ins_class.php");

    $ins_ob = new INS();

    
    require("../../class/sel_class.php");

    $sel_ob = new SEL();

    
    require("../../class/up_class.php");

    $up_ob = new UPD();

   

    $fcr = $catc = "";
    foreach ($fnm as $key => $value) {
        if (strstr($value,'Update ')) {
            // to update existing features in database
            $main_val = str_replace('Update ','',$value);
            $up_con = $up_ob->upd_cat_tb_all($fpr[$key],$icat,$imcat,$main_val);
            if ($up_con) {
                $fcr = "Feature Properties Updated";
            }
        }else {
            // to insert more features in database
            $ins_con = $ins_ob->ins_cat_upl($icat,$imcat,$value,$fpr[$key],$date,$time);       
            if ($ins_con) {
                $catc =  "More Features Uploaded";
            }
        }
    }

    echo '<p>'.$fcr.'</p>';
    echo '<p>'.$catc.'</p>';

    
    
}

?>