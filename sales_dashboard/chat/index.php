
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "../../css/sdash.css" media ="all">
    <link rel="stylesheet" href="../../css/sdash_rep.css" media="all">
    <script src="../../js/jquery.js"></script>
    <script src="../../js/rev.js"></script>
    <script src="../../js/ajax.js"></script>
    <script src="../../js/snd_dash.js"></script>
    <title>USER MESSAGES</title>
</head>
<body id="total-div">
    
    <?php require("../sales_dashboard_layout.php"); ?>

    <section class='main-div-container'>

        <div class="sec-div-container">
            <h1>All Chats</h1>
            <?php
                require("../../class/sel_class.php");
                $sel_ob = new SEL();
                
            ?>

            <?php
                $sel_cono = $sel_ob->sel_su_msg();
                if ($sel_cono) {
                    
                    while ($aow = $sel_cono->fetch_assoc()) {
                        
                    
                   
            ?>
            
                <?php if ($_SESSION['id'] == $aow['rep_id']) { ?>
                
                    
                    <a href="chats?id=<?php echo $aow['user_id']; ?>&name=<?php echo str_replace(' ','-',$aow['username']); ?>">
                        <div class="profile-msg">
                            <div class="prof-msg-img">
                                <?php 
                                    $sel_img = $sel_ob->sel_id_pro($aow['user_id']);
                                    if ($sel_img) {
                                        $dimg = $sel_img->fetch_assoc();
                                ?>

                                <?php if($dimg['img'] == "0"){ ?>
                                    <img src="../../images/user.svg">
                                <?php }else{ ?>    
                                    <img src="../../pics/profile/<?php echo $dimg['img']; ?>">
                                <?php } ?>
                                <?php } ?>

                                
                            </div>

                            <div class="prof-msg-content">
                                <span><?php echo $aow['username']; ?></span>
                                <span>
                                    <?php  
                                        if (strstr($aow['message']," *$* ")) {
                                            $amsg = str_replace(" *$* ","'",$aow['message']);
                                        }else {
                                            $amsg = $aow['message'];
                                        }
                                        echo $amsg; 
                                    ?>
                                </span>
                                
                            </div>
                            
                        </div>
                    </a>
                
                
                <?php } elseif ($_SESSION['id'] == $aow['user_id']) { ?>

                    <a href="chats?id=<?php echo $aow['rep_id']; ?>&name=<?php echo str_replace(' ','-',$aow['rep_name']); ?>">
                        <div class="profile-msg">
                            <div class="prof-msg-img">
                                <?php 
                                    $sel_img = $sel_ob->sel_id_pro($aow['rep_id']);
                                    if ($sel_img) {
                                        $dimg = $sel_img->fetch_assoc();
                                ?>

                                <?php if($dimg['img'] == "0"){ ?>
                                    <img src="../../images/user.svg">
                                <?php }else{ ?>    
                                    <img src="../../pics/profile/<?php echo $dimg['img']; ?>">
                                <?php } ?>
                                <?php } ?>

                                
                            </div>

                            <div class="prof-msg-content">
                                <span><?php echo $aow['rep_name']; ?></span>
                                <span>
                                    <?php  
                                        if (strstr($aow['message']," *$* ")) {
                                            $amsg = str_replace(" *$* ","'",$aow['message']);
                                        }else {
                                            $amsg = $aow['message'];
                                        }
                                         
                                        echo 'You: '.$amsg; 
                                    ?>
                                </span>
                            </div>
                        </div>
                    </a>

                <?php } ?>

            
            <?php } } ?>  

        </div>

    </section>

</body>
</html>