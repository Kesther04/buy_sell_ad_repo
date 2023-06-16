<?php
if ($_SERVER['REQUEST_METHOD']=="POST") {
    $id = $_POST['id'];
    $email = $_POST['email'];
    $pno = $_POST['pno'];
    $cpass = $_POST['cpass'];
    $npass = $_POST['npass'];
    $state = $_POST['state'];
    if (empty($_POST['des'])) {
        $des = 0;
    }else {
        $des = $_POST['des'];
    }
    
    
    require("../../class/up_class.php");

    $upd_ob = new UPD();

    require("../../class/sel_class.php");

    $sel_ob = new SEL();
    
    $sel_con = $sel_ob->sel_id_pro($id);
    if ($sel_con) {
        $row = $sel_con->fetch_assoc();
        $remail = $row['email'];
        $rpass = $row['password'];
        $rstate = $row['state_of_origin'];
        $rlga = $row['lga'];
        $rpno = $row['pnumber'];
    


        if ($cpass !== $rpass AND $npass !== "") {
            echo "<p style='color:red;'>the current password is not correct </p>";
            
        }
        elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
            echo "<p style='color:red;'>Enter a Valid Email Address </p>";
        }
        elseif ($npass == "" AND $state == "" ) {
            
            $up_con = $upd_ob->upd_user_tb($email,$rpass,$pno,$des,$id);
            if ($up_con) {
                echo "<p style='color:blue;'>account details updated successfully</p>";
            }else {
                echo "<p style='color:red;'>account details not updated successfully</p>";
            }

        }
        elseif ($npass !== "" AND $state == "") {
            
            $up_con = $upd_ob->upd_user_tb($email,$npass,$pno,$des,$id);
            if ($up_con) {
                echo "<p style='color:blue;'>account details updated successfully</p>";
            }else {
                echo "<p style='color:red;'>account details not updated successfully</p>";
            }

        }
        elseif ($npass == "" AND $state !== "" AND  $_POST['lga']) {
            $lga = $_POST['lga'];
            $up_con = $upd_ob->upd_user_state_tb($email,$rpass,$pno,$state,$lga,$des,$id);
            if ($up_con) {
                echo "<p style='color:blue;'>account details updated successfully</p>";
            }else {
                echo "<p style='color:red;'>account details not updated successfully</p>";
            }

        }else{
            $lga = $_POST['lga'];
            $up_con = $upd_ob->upd_user_state_tb($email,$npass,$pno,$state,$lga,$des,$id);
            if ($up_con) {
                echo "<p style='color:blue;'>account details updated successfully</p>";
            }else {
                echo "<p style='color:red;'>account details not updated successfully</p>";
            }

        }
        


    }
    

}


?>