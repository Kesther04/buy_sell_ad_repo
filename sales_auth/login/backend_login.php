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
        $sel_con = $sel_ob->sel_log($email,$pass);
        if($sel_con->num_rows>0){
            $row =$sel_con->fetch_assoc();
            $_SESSION['id'] = $row['id'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['pass'] = $row['password'];
            $_SESSION['name'] = $row['fullname'];
            $_SESSION['pno'] = $row['pnumber'];
            $_SESSION['state'] = $row['state_of_origin'];
            $_SESSION['lga'] = $row['lga'];
            $_SESSION['des'] = $row['des'];
    
            header("location:../../sales_dashboard/item_upload/item_upload");
        }else {
            header("location:login.php?msg=INCORRECT EMAIL OR PASSWORD");
        }
    }
}





?>