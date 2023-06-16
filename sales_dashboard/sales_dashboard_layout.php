<?php 
    session_start();
    if(!isset($_SESSION['id'])){
        header('location:../../sales_auth/login/login.php');
    }
?>

<script src="../../js/dash.js"></script>

<div  id="peon" >&#9776;</div>

    <div class="dashboard">
        <div id="losec">&times;</div>
       

        <img src="../../images/dash_logo.png" class="dash-logo">

       
    
        <div class="dash-b">
            <a href="../../" target="blank">
                <span>
                    <img src="../../images/home.svg" class="fir-img"><img src="../../images/lhome.svg" class="sec-img">HOME
                </span>
            </a>
        </div>
        
        <div class="dash-b">
            <a href="../user/profile">
                <span>
                <img src="../../images/user-fill.svg"  class="fir-img"><img src="../../images/user.svg" class="sec-img" >
                USER
                </span>
            </a>
        </div>

        
        <div class="dash-b">
            <a href="../chat/">
                <span>
                <img src="../../images/user-fill.svg"  class="fir-img"><img src="../../images/user.svg" class="sec-img" >
                CHATS
                </span>
            </a>
        </div>

        <div class="dash-b">
            <a href="../item_upload/item_upload">
                <span>
                    <img src="../../images/item_upload.svg"  class="fir-img"><img src="../../images/lblog.svg" class="sec-img" >UPLOAD ITEM
                </span>
            </a>
        </div>

        <div class="dash-b">
            <a href="../item_update/item_update">
                <span>
                <img src="../../images/upd-fill.svg"  class="fir-img"><img src="../../images/upd.svg" class="sec-img">UPDATE ITEM
                </span>
            </a>
        </div>

        <div class="dash-b">
            <a href="../item_delete/item_delete">
                <span>
                <img src="../../images/del-fill.svg"  class="fir-img"><img src="../../images/del.svg" class="sec-img">DELETE ITEM
                </span>
            </a>
        </div>

        <div class="dash-b">
            <a href="../view_items/product_table">
                <span>
                <img src="../../images/vp-fill.svg"  class="fir-img"><img src="../../images/vp.svg" class="sec-img">VIEW ITEMS
                </span>
            </a>
        </div>

        <div class="dash-b">

            <button onclick="if(window.confirm('Are you sure want to log out of this page')){window.location='../../sales_auth/login/login.php';}">
                <span>
                    <img src="../../images/box_log (2).svg"  class="fir-img"><img src="../../images/litem.svg" class="sec-img">LOG OUT
                </span>
            </button>

            
        </div>
        
    </div>



   

