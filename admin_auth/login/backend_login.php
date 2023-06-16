<?php

session_start();

if ($_SERVER['REQUEST_METHOD']=="POST") {    
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    
    require("../../class/sel_class.php");

    $sel_ob = new SEL();


    if (empty($email)) {
        header("location:login.php?msg=ENTER YOUR EMAIL ADDRESS");
    }
    elseif (empty($pass)) {
        header("location:login.php?msg=ENTER YOUR PASSWORD");
    }
    elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        header("location:login.php?msg=INVALID EMAIL ADDRESS");
    }else {
        //to select from the database where email and password provided are available
        $sel_con = $sel_ob->sel_log_admin($email,$pass);
        if($sel_con->num_rows>0){
            $row =$sel_con->fetch_assoc();
            $_SESSION['admin_id'] = $row['id'];
            $_SESSION['admin_email'] = $row['email'];
            $_SESSION['admin_pass'] = $row['password'];
            $_SESSION['admin_name'] = $row['fullname'];
            $_SESSION['admin_pno'] = $row['pnumber'];
    
            header("location:../../admin_dashboard/cat_upload/cat_upload");
        }else {
            header("location:login.php?msg=INCORRECT EMAIL OR PASSWORD");
        }
    }
}





?>