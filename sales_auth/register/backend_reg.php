<?php
if ($_SERVER['REQUEST_METHOD']=="POST") {
    $full = $_POST['full'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $state = $_POST['state'];
    $lga = $_POST['lga'];
    $pass = $_POST['pass'];
    $img = 0;
    $des = 0;
    $pno = $_POST['pno'];
    require("../../date_la_time.php");

    require("../../class/ins_class.php");

    $ins_ob = new INS();

    require("../../class/sel_class.php");

    $sel_ob = new SEL();

    //to select if password and email entered already exists in the database table 
    $sel_con = $sel_ob->sel_log($email,$pass);
    if ($sel_con) {

        $row = $sel_con->fetch_assoc();
        $row['email'];
        $row['password']; 

        if ($row['email'] == $email AND $row['password'] == $pass) {
            
        
            header("location:register.php?msg=PASSWORD ALREADY IN USE PLEASE CREATE ANOTHER PASSWORD");
    
        }else {
        
            //to insert all posted values into the table for registration of sales person
            $ins_con = $ins_ob->ins_sell_reg($img,$full,$gender,$email,$state,$lga,$pass,$pno,$des,$date,$fullDate,$time);
            if ($ins_con) {
                header("location:../login/login.php");

                $sel_don = $sel_ob->sel_log($email,$pass);
                if ($sel_don) {
                    $dow = $sel_don->fetch_assoc();
                    $id = $dow['id'];
                    $sfull = str_replace(' ','-',$full);
                    $fnm = $sfull.'-'.$id;
                    $fcr = mkdir("../../item_posts/$fnm",0700,true);
                    if ($fcr) {
$url = "../../item_posts/$fnm/index.php";
$content =                        
"<?php require('../../session.php'); ?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' href='../../css/style.css' media='all'>
    <link rel='stylesheet' href='../../css/resp_style.css' media='all'>
    <title>Profile</title>
</head>
<body id='total-div'>
    
    
    <?php require('../header.php'); ?>
    

    <section class='profile-page'>
        <!-- the section contains info about the seller and adverts of the seller -->
        
        <div class='fst-mcpc'>
            <?php require('../index_con/profile.php'); ?>
        </div>

        <div class='snd-pp'>
            <div class='inner-snd-mcpc'>
                <?php require('../index_con/commodity.php'); ?>
            </div>
        </div>
    </section>


    <section class='last-container'>
        <!-- container for the footer of the page -->
        <?php require('../footer.php'); ?>
    </section>

    <script src='../../js/jquery.js'></script>
    <script src='../../js/dash.js'></script>
    <script src='../../js/ajax.js'></script>
    <script src='../../js/abt_sel.js'></script>
</body>
</html>";
file_put_contents($url,$content);
                    }
                }
            }else {
                header("location:register.php?msg=NOT REGISTERED");
            }

        }
    }
}


?>