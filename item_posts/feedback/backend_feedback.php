<?php
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $uname = $_POST['fnm'];
        $sname = str_replace('-',' ',$_POST['sname']);
        $email = $_POST['email'];
        $uid = $_POST['uid'];
        $sid = $_POST['sid'];
        $feed = htmlspecialchars($_POST['com']);
        $rep = 0;
        $likes = 0;
        require("../../date_la_time.php");

        if (empty($uname)) {
            echo "<p style='color:red;font-weight:bold;'>please input your name</p>";
        }
        elseif (!preg_match("/^[a-zA-Z ]*$/",$uname)) {
            echo "<p style='color:red;font-weight:bold;'>please use only letters for your name</p>";
        }
        elseif (empty($feed)) {
            echo "<p style='color:red;font-weight:bold;'>Place a Comment</p>";
        }
        elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
            echo "<p style='color:red;font-weight:bold;'>Invalid Email</p>";
        }else {
            

            require('../../class/ins_class.php');
            $ins_ob = new INS();
    
    
            $ins_con = $ins_ob->ins_feed($sid,$uid,$sname,$uname,$email,$feed,$likes,$rep,$date,$time);
            if ($ins_con) {    
                
                echo "<p style='color:blue;font-weight:bold;'>Feedback Uploaded</p>";
    
            }else{
                echo "<p style='color:red;font-weight:bold;'>Feedback not Uploaded</p>";
                
            
            }    

           
        }


        

        
    }


?>