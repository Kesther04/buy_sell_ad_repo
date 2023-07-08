<?php 
    session_start();
    if(!isset($_SESSION['admin_id'])){
        echo "<script>window.location='../admin_auth/login.php'</script>";
    }
?>

<script src="../js/dash.js"></script>

<div  id="peon" >&#9776;</div>

    <div class="dashboard">
        <div id="losec">&times;</div>
       

        <img src="../images/dash_logo.png" class="dash-logo">

       
    
        <div class="dash-b">
            <a href="../" target="blank">
                <span>
                    <img src="../images/home.svg" class="fir-img"><img src="../images/lhome.svg" class="sec-img">HOME
                </span>
            </a>
        </div>
        
        <div class="dash-b">
            <a href="cat_upload.php">
                <span title="Upload Category for commodity input and feature selection">
                    <img src="../images/item_upload.svg"  class="fir-img"><img src="../images/lblog.svg" class="sec-img">UPLOAD CATEGORY
                </span>
            </a>
        </div>

        <div class="dash-b">
            <a href="cat_img.php">
                <span title="Update Images of already uploaded categories">
                    <img src="../images/item_upload.svg"  class="fir-img"><img src="../images/lblog.svg" class="sec-img">UPLOAD IMAGES
                </span>
            </a>
        </div>

        <div class="dash-b">
            <a href="cat_update.php">
                <span title="Upload more features for already existing category as well as update of features">
                <img src="../images/upd-fill.svg"  class="fir-img"><img src="../images/upd.svg" class="sec-img">UPDATE CATEGORY
                </span>
            </a>
        </div>


        <div class="dash-b">
           
                
            <button onclick="if(window.confirm('Are you sure want to log out of this page')){window.location='../admin_auth/login.php';}">
                <span>
                    <img src="../images/box_log (2).svg"  class="fir-img"><img src="../images/litem.svg" class="sec-img">LOG OUT
                </span>
            </button>

            
        </div>
        
    </div>



   

