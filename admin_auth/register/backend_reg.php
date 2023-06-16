<?php
if ($_SERVER['REQUEST_METHOD']=="POST") {
    $full = $_POST['full'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $pno = $_POST['pno'];
    require("../../date_la_time.php");

    require("../../class/ins_class.php");

    $ins_ob = new INS();

    require("../../class/sel_class.php");

    $sel_ob = new SEL();

    //to select if password and email entered already exists in the database table 
    $sel_con = $sel_ob->sel_log_admin($email,$pass);
    if ($sel_con) {

        $row = $sel_con->fetch_assoc();
        $row['email'];
        $row['password']; 

        if ($row['email'] == $email AND $row['password'] == $pass) {
            
            header("location:register.php?msg=PASSWORD ALREADY IN USE PLEASE CREATE ANOTHER PASSWORD");
    
        }else {
        
            //to insert all posted values into the table for registration of sales person
            $ins_con = $ins_ob->ins_admin_reg($full,$email,$pass,$pno,$date,$time);
            if ($ins_con) {
                header("location:../login/login.php");
            }else {
                header("location:register.php?msg=NOT REGISTERED");
            }

        }
    }
}


?>