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

     

    $sel_con = $sel_ob->cat_tb_all($icat,$imcat);
    if ($sel_con->num_rows>=0) {
        $row = $sel_con->fetch_assoc();

        if ($row['item_cat'] == $icat AND $row['group_in_cat'] == $imcat) {

            echo "Category Already Created";

        }else {
            $catc = $fcr = " ";  
            foreach($fnm as $key => $value){

                $ins_con = $ins_ob->ins_cat_upl($icat,$imcat,$value,$fpr[$key],$date,$time);       
                if ($ins_con) {
                    $catc =  "Category Created";

                }
            }

            $fcr = mkdir("../../cat_posts/$icat/$imcat",0700,true);
            
            $url = "../../cat_posts/".$icat."/index.php";
            $content = 
"
<?php 

    //the required page below is too attain the content of this page for this particular category
    require('../sen_index_content.php'); 

?>";
                $uc = file_put_contents($url,$content);
                if ($uc) {
                    
                    $murl = "../../cat_posts/".$icat."/".$imcat."/index.php";
                    $mcontent = 
"
<?php 

    //the required page below is too attain the content of this page for this particular category
    require('../../index_content.php'); 

?>              
";
                file_put_contents($murl,$mcontent);
                
                }
            

            echo $catc;
        }
    }

}

?>