<?php 
    // if(!isset($_SESSION['id'])){
    //     echo "<script>window.location='../../sales_auth/login.php'</script>";
    // }
?>

<div class="header">
    <!--header of the page-->

    <div class=" fst-header"><img src="../../images/logo.png" class="logo"></div>
    <!--logo of the website-->

    <div class="nav-af-fst" id="naf-open">&#9776;</div>
    
    <div class="af-fst-header">
        <div class="nav-af-fst" id="naf-close">&times;</div>
    
        <div class="snd-header">
            <input type="text" placeholder="Search what you are looking for.." name="search" ><span class="imgcat"><img src="../../images/search.svg"></span>
        </div>
        <!-- input for searching goods or services you are looking for-->

        <div class="nav thr-header">
            <ul>
                <?php if (!isset($_SESSION['id'])) { ?>
                    <li><a href="../../sales_auth/login.php">Sign in</a></li>
                    <li><a href="../../sales_auth/register.php">Registration</a></li>
                    <li><a href="../../sales_dashboard/item_upload.php" id="sel-nav">SELL</a></li>
                
                <?php }else{ ?>
                    
                    <li><a href="../../">Home</a></li>
                    <li><a href="../../sales_dashboard/">Profile</a></li>
                    <li><a href="../../sales_dashboard/saved.php">Saved</a></li>
                    <li><a href="../../sales_dashboard/all_chat.php">Messages</a></li>
                    <li><a href="../../sales_dashboard/item_upload.php" id="sel-nav">SELL</a></li>
                    
                <?php  } ?>
                
                
            </ul>
        </div>
        <!--links for different features-->
    </div>
</div>