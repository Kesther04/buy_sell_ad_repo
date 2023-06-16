<?php

if ($_SERVER['REQUEST_METHOD']=="POST") {
   
    $uid=$_POST['id'];
    $uname=$_POST['uname'];
    $email=$_POST['email'];
    
    if (strstr($_POST['msg'],"'")) {
        $bmsg = str_replace("'"," *$* ",$_POST['msg']);
        $msg = htmlspecialchars($bmsg);
    }else {
        $msg = htmlspecialchars($_POST['msg']);
    }
    $rid = $_POST['rid'];
    if ($uid > $rid) {
        $cid = $rid.'.'.$uid;
    }else{
        $cid = $uid.'.'.$rid;
    }
    
    $rname = $_POST['rname']; 
    require("../../date_la_time.php");
   
    require("../../class/ins_class.php");
    $ins_ob = new INS();

    $ins_con = $ins_ob->ins_msg($cid,$uid,$uname,$email,$msg,$date,$time,$rid,$rname);
    if ($ins_con) {
        echo "inserted successfully";
    }else{
        echo "not inserted";
    }
    
}    

?>