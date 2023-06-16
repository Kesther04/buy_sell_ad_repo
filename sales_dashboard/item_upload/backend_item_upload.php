<?php

if ($_SERVER['REQUEST_METHOD']=="POST") {
    $it_name = $_POST['iname'];
    $nt = str_replace(' ','-', $_POST['iname']);
    $group = $_POST['igroup'];
    $cat_group = $_POST['inngroup'];
    $loc = $_POST['locat'];
    $price = $_POST['iprice'];
    $img = $_FILES['img']['name'];
    $filetype = $_FILES['img']['type'];
    $filesize = $_FILES['img']['size'];
    $uname = $_POST['uname'];
    $uid = $_POST['uid'];
    $cid = $_POST['cid'];
    $pno = $_POST['pno'];
    $fn = $_POST['fn'];
    $fp = $_POST['fp'];
    $des = $_POST['des'];
    require("../../date_la_time.php");


    require("../../class/ins_class.php");

    $ins_ob = new INS();

    require("../../class/sel_class.php");

    $sel_ob = new SEL();

    // require("../../class/del_class.php");

    // $del_ob = new DEL();

    require("../../class/up_class.php");

    $up_ob = new UPD();

    $sel_con = $sel_ob->sel_nt($uid,$nt,$cat_group);
    if ($sel_con->num_rows > 0) {
        $row = $sel_con->fetch_assoc();
        $snt = $row['item_name'];      
    }
    
    //file upload configuration
    $targetDir = "../../pics/";
    $allowTypes = array('jpg','png','jpeg','jfif');

    $fileNames = array_filter($img);

    
    if ($sel_con->num_rows > 0 AND  $snt == $nt ){

        echo 'FILE TITLE ALREADY IN USE';
        
    }else {
       
        $ins_con = $ins_ob->ins_item($uid,$nt,$group,$cat_group,0,$loc,$price,$uname,$pno,$des,$date,$fullDate,$time);
        if ($ins_con) {
            

            $insSuccess = $sizeError = "";

            foreach ($img as $key => $value) {
    
                
                if ($filesize[$key] > 100000000) {
        
                   
                    $sizeError = "<p>FILESIZE IS TOO LARGE,PLEASE UPLOAD ANOTHER FILE </p>"; 

                    

                }else {
            
                    // File upload path
                    $fileName = basename($img[$key]);
                    $targetFilePath = $targetDir.$fileName;

                    

                    //check whether file type is valid
                    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

                    if (in_array($fileType,$allowTypes)) {
                        
                        //upload file to server
                        if (move_uploaded_file($_FILES['img']["tmp_name"][$key],$targetFilePath)){
                            
                            //Image db insert sql 
                            $insval = "('".$fileName."',NOW()),";
                        }
                    }

                    if (!empty($insval)) {
                        $insval = trim($insval,',');

                        //insert image file name into database
                        $sel_cont = $sel_ob->sel_nt($uid,$nt,$cat_group);
                        if ($sel_cont) {
                            $dow = $sel_cont->fetch_assoc();
                            $item_id = $dow['id'];
                            $insSuccess = "<p>ITEM UPLOADED SUCCESSFULLY</p>";
                            $up_con = $up_ob->up_itm_img($img[0]);
                            $ins_img_con = $ins_ob->ins_img_item($item_id,$fileName,$filesize[$key],$fileType,$date,$time);
                        }
                        
                    }

                    
                        
                }

                            
                

            }
            echo $insSuccess;
            echo $sizeError;

            $insfeat = "";
            foreach ($fn as $key => $value) {
                
                $sel_cont = $sel_ob->sel_nt($uid,$nt,$cat_group);
                if ($sel_cont) {
                    $dow = $sel_cont->fetch_assoc();
                    $item_id = $dow['id'];

                    //insert features of the commodity
                    $ins_ken = $ins_ob->ins_feat($cid[$key],$item_id,$nt,$value,$fp[$key],$date,$time);
                    if ($ins_ken) {
                        $insfeat = "Features Uploaded";
                    }

                }
                
            }

            echo $insfeat;

            $sel_bunt = $sel_ob->sel_id_pro($uid);
            if ($sel_bunt) {
                $cow = $sel_bunt->fetch_assoc();
                $cowFm = str_replace(' ','-',$cow['fullname']);        
                $foldName = $cowFm.'-'.$uid;
            

            $url = '../../'.'item_posts'.'/'.$foldName.'/'.$nt.'.php';
$content = "
<?php require('../../session.php'); ?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' href='../../css/style.css' media='all'>
    <link rel='stylesheet' href='../../css/resp_style.css' media='all'>
    <link rel='stylesheet' href='../../css/bin_cd.css' media='all'>
    <title>$it_name</title>
</head>
<body id='total-div'>
    
    
        
            
    <section class='fst-container'>
        <!-- the first section of the page-->
        <?php require('../header.php'); ?>
        
        <div class='prod-name'>$it_name</div>

        <div class='fst-container-prod'>
            <div class='img-container-prod'>

                <div class='container-prod'>
                    <!-- Slider main container -->
                    <div class='swiper'>
                        <!-- Additional required wrapper -->
                        
                        <div class='swiper-wrapper'>
                            <!-- Slides -->
                            <?php require('../img_show.php'); ?>
                        </div>

                        <!-- If we need pagination -->
                        <div class='swiper-pagination'></div>

                        <!-- If we need navigation buttons -->
                        <div class='swiper-button-prev'></div>
                        <div class='swiper-button-next'></div>

                    </div>
                </div>

                <!-- the link to the page of the  feature of the commodity provided -->
                <?php require('../feature.php'); ?>
                    
                
            </div>

            <div class='after-img-container-prod'>

                <div class='fst-aicp'>
                    <!-- cost of the item -->
                    <?php require('../price.php'); ?>
                </div>

                <div class='snd-aicp'>
                    <!-- contact,chat system and profile details about the sales person  -->
                    <?php require('../profile.php'); ?>
                    
                </div>

                <div class='thd-aicp'>
                    <!-- feedback link -->
                    <?php require('../feedback/index.php'); ?>
                </div>

                <div class='fth-aicp'>
                    <!-- safety tips for customers/purchasers -->
                    <h3>SAFETY TIPS</h3>
                    <ul>
                        <li>Remember, don't send any pre-payments.</li>
                        <li>Meet the seller at a safe public place.</li>
                        <li>Inspect the goods to make sure they meet your needs.</li>
                        <li>Check all documentation and only pay if you're satisfied.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class='snd-container-prod'>
        <!-- container for other commodities of this category -->
        <div class='inner-snd-contaner-prod'>
            <h1>Similar Ads</h1>
        </div>
        <div class='inner-snd-container-prod'>
            <?php require('../commodity.php');?>
        </div>
        

    </section>

    <section class='last-container'>
        <!-- container for the footer of the page -->
        <?php require('../footer.php'); ?>
    </section>

    

    <script src='../../js/bin_cd.js'></script>
    <script src='../../js/eee.js'></script>
    <script src='../../js/jquery.js'></script>
    <script src='../../js/dash.js'></script>
    <script src='../../js/ajax.js'></script>
</body>
</html>
";

file_put_contents($url,$content);

            }
            
        }else{
            echo "<p>ITEM NOT UPLOADED</p>";
        }
        
    }

       
    
}


?>