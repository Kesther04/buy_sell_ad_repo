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
    <title>Opinions</title>
</head>
<body id='total-div'>

    <section id='masag'>
        
        <div class='msg'>    
            <button class='aj-btn'>Back</button>
            <div class='msa'></div>
            
        </div>
    </section>

    <section class='fst-container'>
        <!-- the first section of the page-->
        <?php 
            require('../header.php'); 
            require('../../class/sel_class.php');   
            $sel_ob = new SEL(); 
        ?>

        <div class="feedback-container">
            <div class="feedback-container-prod">
                <!-- this div is for all feedbacks from the customers on this particular sales person -->
                <form class='comfm' action='backend_feedback.php' method='post'>
                    <h1>Feedback</h1>
                    <table>
                        <tr> <td><input type="text" name='com'  id='com-txt' placeholder='Type in your Feedback on this seller' required></td>
                        <input type='hidden' name='fnm'  value='<?php echo $_SESSION['name']; ?>' required readonly>
                        <input type='hidden' name='email'  value='<?php echo $_SESSION['email']; ?>' required readonly>
                        <input type='hidden' name='uid'  value='<?php echo $_SESSION['id']; ?>' required readonly>
                        <input type='hidden' name='sid'  value='<?php echo $_GET['id']; ?>' required readonly>
                        <input type='hidden' name='sname'  value='<?php echo $_GET['name']; ?>' required readonly>
                        <td><div><button id="btn-nav">ENTER</button></div></td>
                        </tr>
                    
                    </table>
                    
                </form>

                <?php
                    $sel_con = $sel_ob->sel_feed($_GET['id'],str_replace('-',' ',$_GET['name']));
                    if ($sel_con) { while ($row = $sel_con->fetch_assoc()) {
                ?>
                    <div class="inner-feedback">
                    
                        <div class="fst-inner-fdbk-con-prod">
                            <div class='profile-snd-aicp'>
                                <?php 
                                    $sel_don = $sel_ob->sel_id_pro($row['user_id']);
                                    if ($sel_don) {
                                        $dow = $sel_don->fetch_assoc();
                                        if ($dow['img'] == "0") {
                                    
                                ?>
                                <div class="prof-det-img">
                                    <img src="../../images/user.svg">
                                </div>
                                <?php }else{ ?>
                                <div class="prof-det-img">
                                    <img src="../../pics/profile/<?php echo  $dow['img']; ?>">
                                </div>
                                <?php }} ?>
                                <div class="prof-det-content">
                                    <span><?php  echo $row['username']?></span>
                                </div>
                            </div>

                            <div>
                                <p><?php echo $row['feed_back']; ?></p>
                            </div>

                        </div>
                        <div class="under-fifcp">
                            <div><?php echo str_replace('-','/',$row['date']); ?></div>
                            
                            <div class="feed-like-btn">

                                <?php 
                                    $sel_like = $sel_ob->sel_pt_like($row['id'],$_SESSION['id']);
                                    if ($sel_like->num_rows>0) {
                                ?>       
                                    <form class="del-like-btn" action="like/dellike.php" method="post">
                                        <input type="hidden" name="cid" value="<?php echo $row['id']; ?>" readonly required>
                                        <input type="hidden" name="sid" value="<?php echo $_SESSION['id']; ?>" readonly required>
                                        <input type="hidden" name="sname" value="<?php echo $_SESSION['name']; ?>" readonly required>
                                        <?php if ($row['likes'] <= 1) { ?>
                                            <?php echo $row['likes']; ?>
                                            <button class="prf-like">Like</button>
                                        <?php }else{ ?>
                                            <?php echo $row['likes']; ?>
                                            <button class="prf-like">Likes</button>
                                        <?php } ?>
                                    
                                    </form>
                                <?php }else {  ?>
                                    

                                    <form class="add-like-btn" action="like/addlike.php" method="post">
                                        <input type="hidden" name="cid" value="<?php echo $row['id']; ?>" readonly required>
                                        <input type="hidden" name="sid" value="<?php echo $_SESSION['id']; ?>" readonly required>
                                        <input type="hidden" name="sname" value="<?php echo $_SESSION['name']; ?>" readonly required>
                                        <?php if ($row['likes'] <= 1) { ?>
                                            <?php echo $row['likes']; ?>
                                            <button>Like</button>
                                        <?php }else{ ?>
                                            <?php echo $row['likes']; ?>
                                            <button>Likes</button>
                                        <?php } ?>
                                        
                                    </form>
                                <?php  } ?>
                                
        
                                

                                
                            </div>

                            <div class="feed-rep-btn" title="Add Reply and View Other Replies">
        
                                <form class="rep-btn-frm" action="reply.php" method="post">
                                    <input type="hidden" name="cid" value="<?php echo $row['id']; ?>" readonly required>
                                    <input type="hidden" name="sid" value="<?php echo $_SESSION['id']; ?>" readonly required>
                                    <input type="hidden" name="sname" value="<?php echo $_SESSION['name']; ?>" readonly required>
                                    <?php if ($row['reply'] <= 1) { ?>
                                        <?php echo $row['reply']; ?>
                                        <button>Reply</button>
                                    <?php }else{ ?>
                                        <?php echo $row['reply']; ?>
                                        <button>Replies</button>
                                    <?php } ?>
                
                                </form>
                            </div>
                        </div>

                                                
                        <div class="reply-container-prod">
                            
                            
                            <?php
                                 $sel_gon = $sel_ob->sel_onl_replyly($row['id']);
                                if ($sel_gon) { while ($dow = $sel_gon->fetch_assoc()) {
                            ?>
                                <div class="inner-reply">
                                
                                    <div class="fst-inner-fdbk-con-prod">
                                        <div class='profile-snd-aicp'>
                                            <?php 
                                                $sel_don = $sel_ob->sel_id_pro($dow['sel_id']);
                                                if ($sel_don) {
                                                    $drow = $sel_don->fetch_assoc();
                                                    if ($drow['img'] == "0") {
                                                
                                            ?>
                                            <div class="prof-det-img">
                                                <img src="../../images/user.svg">
                                            </div>
                                            <?php }else{ ?>
                                            <div class="prof-det-img">
                                                <img src="../../pics/profile/<?php echo  $drow['img']; ?>">
                                            </div>
                                            <?php }} ?>
                                            <div class="prof-det-content">
                                                <span><?php  echo $dow['sel_name']?></span>
                                            </div>
                                        </div>

                                        <div>
                                            <p><?php echo $dow['reply']; ?></p>
                                        </div>

                                    </div>
                                    <div class="under-fifcp">
                                        <div>
                                            <?php echo  str_replace('-','/',$dow['date']); ?>
                                        </div>
                                        <div class="feed-like-btn">

                                            <?php 
                                                $sel_rep_like = $sel_ob->sel_pt_rep_like($dow['id'],$_SESSION['id']);
                                                if ($sel_rep_like->num_rows>0) {
                                            ?>       
                                                <form class="del-rep-like-btn" action="rep_like/dellike.php" method="post">
                                                    <input type="hidden" name="rid" value="<?php echo $dow['id']; ?>" readonly required>
                                                    <input type="hidden" name="sid" value="<?php echo $_SESSION['id']; ?>" readonly required>
                                                    <input type="hidden" name="sname" value="<?php echo $_SESSION['name']; ?>" readonly required>
                                                    <?php if ($dow['likes'] <= 1) { ?>
                                                        <?php echo $dow['likes']; ?>
                                                        <button class="prf-like">Like</button>
                                                    <?php }else{ ?>
                                                        <?php echo $dow['likes']; ?>
                                                        <button class="prf-like">Likes</button>
                                                    <?php } ?>
                                                
                                                </form>
                                            <?php }else {  ?>
                                                

                                                <form class="add-rep-like-btn" action="rep_like/addlike.php" method="post">
                                                    <input type="hidden" name="rid" value="<?php echo $dow['id']; ?>" readonly required>
                                                    <input type="hidden" name="sid" value="<?php echo $_SESSION['id']; ?>" readonly required>
                                                    <input type="hidden" name="sname" value="<?php echo $_SESSION['name']; ?>" readonly required>
                                                    <?php if ($dow['likes'] <= 1) { ?>
                                                        <?php echo $dow['likes']; ?>
                                                        <button>Like</button>
                                                    <?php }else{ ?>
                                                        <?php echo $dow['likes']; ?>
                                                        <button>Likes</button>
                                                    <?php } ?>
                                                    
                                                </form>
                                            <?php  } ?>
                                            
                    
                                            

                                            
                                        </div>
                                        <div class="feed-rep-btn" title="Add Reply and View Other Replies">
        
                                            <form class="rep-rep-btn-frm" action="reply_rep.php" method="post">
                                                <input type="hidden" name="cid" value="<?php echo $row['id']; ?>" readonly required>
                                                <input type="hidden" name="rid" value="<?php echo $dow['id']; ?>" readonly required>
                                                <input type="hidden" name="sid" value="<?php echo $_SESSION['id']; ?>" readonly required>
                                                <input type="hidden" name="sname" value="<?php echo $_SESSION['name']; ?>" readonly required>
                                                <?php 
                                                    $selr = $sel_ob->sel_reply_rep($dow['id']); 
                                                    $rird = mysqli_num_rows($selr);
                                                ?>
                                                <?php if ($rird <= 1) { ?>
                                                    <?php echo $rird; ?>
                                                    <button>Reply</button>
                                                <?php }else{ ?>
                                                    <?php echo $rird; ?>
                                                    <button>Replies</button>
                                                <?php } ?>
                            
                                            </form>
                                        </div>
                                    </div>
                                    
                                </div>
                            <?php }} ?>

                            
                        </div>
                        
                        
                    </div>
                <?php }} ?>

                
            </div>

            <div class="after-fdbk-container-prod">
                <!-- info about what page is  -->
                <p>
                    Your feedback is very important for the seller review. Please, leave the honest review to help other buyers and the seller in the customer attraction.
                </p>
            </div>
        </div>
    </section>


    <section class='last-container'>
        <!-- container for the footer of the page -->
        <?php require('../footer.php'); ?>
    </section>
    
    <script src="../../js/jquery.js"></script>
    <script src="../../js/ajax.js"></script>
    <script src="../../js/dash.js"></script>
</body>
</html>
