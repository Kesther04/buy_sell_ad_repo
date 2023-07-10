<?php require("session_index.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" media="all">
    <link rel="stylesheet" href="css/resp_style.css" media="all">
    <link rel="stylesheet" href="css/bin_cd.css" media="all">
    <title>HOME</title>
</head>
<body id="total-div">
    
    <?php
        require("class/sel_class.php");
        $sel_ob = new SEL();
    ?>
    <section class="fst-container">
        <!-- the first section of the page-->
        <div class="header">
            <!--header of the page-->

            <div class=" fst-header"><img src="images/logo.png" class="logo"></div>
            <!--logo of the website-->

            <div class="nav-af-fst" id="naf-open">&#9776;</div>

            <div class="af-fst-header">
                <div class="nav-af-fst" id="naf-close">&times;</div>
            
                <div class="snd-header">
                    <input type="text" placeholder="Search what you are looking for.." name="search" >
                    <span class="imgcat"><img src="images/search.svg"></span>
                </div>
            
                <!-- input for searching goods or services you are looking for-->

                <div class="nav thr-header">
                    <ul>
                        <?php if (!isset($_SESSION['id'])) { ?>
                            <li><a href="sales_auth/login.php">Sign in</a></li>
                            <li><a href="sales_auth/register.php">Registration</a></li>
                            <li><a href="sales_dashboard/item_upload.php" id="sel-nav">SELL</a></li>
                        
                        <?php }else{ ?>
                            
                            <li><a href="">Home</a></li>
                            <li><a href="sales_dashboard/">Profile</a></li>
                            <li><a href="sales_dashboard/saved.php">Saved</a></li>
                            <li><a href="sales_dashboard/all_chat">Messages</a></li>
                            <li><a href="sales_dashboard/item_upload.php" id="sel-nav">SELL</a></li>
                        
                        <?php  } ?>
                        
                        
                    </ul>
                </div>
                <!--links for different features-->
                
            </div>
            
        </div>
    
        <div class="img-container">

            <div class="container">
                <!-- Slider main container -->
                <div class="swiper">
                    <!-- Additional required wrapper -->
                    <div class="bf-con"></div>
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        <div class="swiper-slide"><img src="images/wp4.jpeg"></div>
                        <div class="swiper-slide"><img src="images/wp6.jpg"></div>
                        <div class="swiper-slide"><img src="images/wp3.jpg"></div>
                    </div>

                    <!-- If we need pagination -->
                    <div class="swiper-pagination"></div>

                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>

                </div>
            </div>
        </div>
    </section>   
    
    <section class="snd-container">
        <!-- the second section of the page -->

        <div class="fst-snd-container">
            <!-- the part of the page for selecting ads -->
            <h3>SELECT ADS</h3>

            <div class="inner-fst-snd-container">
                <nav>
                    <ul>
                        <?php
                            
                            $sel_con = $sel_ob->sel_all_grpitem();
                            if ($sel_con) {
                                while ($row = $sel_con->fetch_assoc()) {
                                    
                                    $im = $row['item_cat'];
                                    $selt = $sel_ob->sel_namenogp($im);
                        ?>
                            
                            <li>
                                <?php
                                    $sel_cat_img = $sel_ob->cat_tb_itmcat($im);
                                    if ($sel_cat_img) {$cdow = $sel_cat_img->fetch_assoc();
                                ?>
                                    <?php if ($cdow['ic_img'] == '0') { echo "<div class='cat-img'></div>"; }else{ ?>
                                        <div class="cat-img">
                                            <img src="pack_image/<?php echo $cdow['ic_img']; ?>" width="50">
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                                <?php 
                                    echo str_replace('-',' ',$row['item_cat']);
                                    if(mysqli_num_rows($selt) == 1){
                                    echo  '<br>'.mysqli_num_rows($selt).' ad';
                                    }else {
                                        echo  '<br>'.mysqli_num_rows($selt).' ads';
                                    } 
                                ?>
                                <ul>
                                    <li class="backfst-nav">
                                        
                                        <div class="inner-masag-cot-back" title="back to page">
                                            <img src="images/arro.svg" width="30" class="sec-img">
                                            <img src="images/arro-fill.svg" width="30" class="fir-img">
                                        </div>
                                        
                                    </li>
                                    <?php 
                                        $sel_don = $sel_ob->sel_namegp($im);
                                        if ($sel_don) {
                                            while ($dow = $sel_don->fetch_assoc()) {
                                                $group = $dow['group_in_cat'];
                                                $selc = $sel_ob->sel_catnamegp($group);
                                    ?>
                                        <a href="cat_posts/<?php echo $dow['item_cat'].'/'.$group ?>">
                                        
                                            <li>
                                                <?php
                                                    $sel_mcat_img = $sel_ob->cat_tbin_cat($group);
                                                    if ($sel_mcat_img) {$cdow = $sel_mcat_img->fetch_assoc();
                                                ?>
                                                    <?php if ($cdow['gic_img'] == '0') { echo "<div class='cat-img'></div>"; }else{ ?>
                                                        <div class="cat-img">
                                                            <img src="pack_image/<?php echo $cdow['gic_img']; ?>" width="50">
                                                        </div>
                                                    <?php } ?>
                                                <?php } ?>
                                                <?php 
                                                    echo str_replace('-',' ',$dow['group_in_cat']);
                                                    if(mysqli_num_rows($selc) == 1){
                                                        echo  '<br>'.mysqli_num_rows($selc).' ad';
                                                    }else {
                                                        echo  '<br>'.mysqli_num_rows($selc).' ads';
                                                    } 
                                                ?>
                                            </li>
                                        </a>
                                    <?php  } } ?>
                                </ul>
                            </li>
                            
                        <?php  } } ?>
                    </ul>
                </nav>
            </div>
        </div>
        

        <div class="snd-snd-container">
            <!-- the part of the page for showing trending ads -->
            <h3>TRENDING ADS</h3>
            <div class="ssc-main">
                <?php
                    $sel_trend = $sel_ob->sel_all_items();
                    if ($sel_trend) {
                        while ($tow = $sel_trend->fetch_assoc()) {
                
                ?>
                <?php 
                    $usn = str_replace(' ','-',$tow['sel_name']); 
                    $dubUSN = $usn.'-'.$tow['sel_id'];
                ?>
                
                    <div class="ssc-main-inner">
                        <!-- a trending ad -->
                        
                        <a href="item_posts/<?php echo $dubUSN.'/'.$tow['item_name']; ?>">
                            <div class="ssc-main-img"> 
                                <!--item img--> 
                                
                                <div class="inner-scc-main-img">
                                    
                                        <img src="pics/<?php echo $tow['img']; ?>" class="img-ismm" >
                                    

                                
                                    <div class="fst-other-ismm">
                                        <!-- number of items -->
                                        <?php  
                                            $sel_tum = $sel_ob->sel_img_id($tow['id']);
                                            echo mysqli_num_rows($sel_tum);
                                        ?> 
                                    </div>

                                    

                                </div>
                                

                                
                            </div>
                        </a>
                        
                        <div class="snd-other-ismm">
                            <!-- save product to view in your saved -->

                            <?php if (!isset($_SESSION['id'])) { ?>
                                <a href="sales_auth/login.php">
                                    <img src="images/save.svg" title="save commodity">
                                </a>
                            <?php }else{ ?>
                            
                            <?php
                                $selSave = $sel_ob->sel_save_id($tow['id'],$_SESSION['id']);
                            ?>
                            
                            <?php if ($selSave->num_rows>0) { ?>
                                <form class="sdel" action="saved/del_saved.php" method="post">
                                    <input type="hidden" name="id" value="<?php echo $tow['id']; ?>" required readonly>
                                    <button><img src="images/save-fill.svg" title="remove from saved"></button>
                                </form>
                                
                            <?php }else{ ?>
                                <form class="sinp" action="saved/input_saved.php" method="post">
                                    <input type="hidden" name="id" value="<?php echo $tow['id']; ?>" required readonly>
                                    <button><img src="images/save.svg" title="save commodity"></button>
                                </form>
                                
                            <?php } ?>
                            
                            <?php } ?>
                            
                        </div>

                        <a href="item_posts/<?php echo $dubUSN.'/'.$tow['item_name']; ?>">
                            <div class="ssc-main-content">
                                <div> 
                                    <!--item name--> 
                                    <?php echo str_replace('-',' ',$tow['item_name']); ?>
                                
                                </div>
                                

                                <div class="price-smc"> 
                                    <!--item price--> 
                                    <?php echo 'N'.number_format($tow['price'],3); ?>
                                </div>

                            </div>
                        </a>

                    </div>
                
                <?php  } }  ?>
            </div>
        </div>

    </section>

    <section class="last-container">
        <!-- the last container of the page / this container is the footer -->

        <div class="fst-inner-lc">
            

            <div class="inner-last-container">
                <h1>About Us</h1>

                <a href="#">About</a>
                <a href="#">Our Blog </a>
                <a href="#">Terms & Conditions </a>
                <a href="#">Privacy Policy </a>
                <a href="#">Billing Policy </a>
                <a href="#">Copyright Infringement Policy </a>
            </div>


            <div class="inner-last-container">
                <h1>Support</h1>

                <a href="#">support@*** </a>
                <a href="#">Safety Tips </a>
                <a href="#">Contact Us </a>
                <a href="#">FAQ </a>
            </div>
                        
            <!-- Available on the App Store
            Get it on Google Play -->


            <div class="inner-last-container">
                <h1>Hot links</h1>

                <a href="#">Brand </a>
                <a href="#">Regions </a>
            </div>

            
            <div class="inn-fst-last">
                <h1>Follow Us On:</h1>

                <div class="inner-fst-last">
                    

                    <a href=""><div title="facebook"><img src="images/book.png"><img src="images/face.png" class="sm-link"></div></a>
                    <a href=""><div title="Instagram"><img src="images/gram.png"><img src="images/insta.png" class="sm-link"></div></a>
                    <a href=""><div title="Twitter"><img src="images/tter.png"><img src="images/twi.png" class="sm-link"></div></a>
                    <a href=""><div title="WhatsApp"><img src="images/what (1).png"><img src="images/what (2).png" class="sm-link"></div></a>
                    
                </div>
            </div>

        </div>
        <div class="snd-inner-lc">
            <span>&copy;<?php echo date("Y"); ?> ****,All rights reserved</span>
        </div>

    </section>
    
    

    <script src="js/bin_cd.js"></script>
    <script src="js/eee.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/dash.js"></script>
    <script src="js/ajax.js"></script>
</body>
</html>