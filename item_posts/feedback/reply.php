<script src="../../js/jquery.js"></script>
<script src="../../js/ajax.js"></script>

<?php if ($_SERVER['REQUEST_METHOD']=="POST") { ?>
    <?php 
        require('../../class/sel_class.php');   
        $sel_ob = new SEL(); 
    ?>

    <form class='repfm' action='backend_reply.php' method='post'>

        <table>
            <tr> 
                <td><textarea name='com'  id='rep-txt' placeholder='Type in your Reply for this Feedback' required></textarea></td>
                <input type='hidden' name='cid'  value='<?php echo $_POST['cid']; ?>' required readonly>
                <input type='hidden' name='sid'  value='<?php echo $_POST['sid']; ?>' required readonly>
                <input type='hidden' name='sname'  value='<?php echo $_POST['sname']; ?>' required readonly>
                <td><button id="btn-nav">ENTER</button></td>
            </tr>  

        </table>

    </form>

    <div class="sep-reply-container-prod">
                            
        
        <?php
            $sel_con = $sel_ob->sel_dub_reply($_POST['cid'],0);
             if ($sel_con->num_rows>0) { while ($dow = $sel_con->fetch_assoc()) {
        ?>
            <div class="inner-feedback">
            
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
                    <div><?php echo  str_replace('-','/',$dow['date']); ?></div>
                    <div class="feed-like-btn">

                        <?php 
                            $sel_rep_like = $sel_ob->sel_pt_rep_like($dow['id'],$_POST['sid']);
                            if ($sel_rep_like->num_rows>0) {
                        ?>       
                            <form class="del-rep-like-btn" action="rep_like/dellike.php" method="post">
                                <input type="hidden" name="rid" value="<?php echo $dow['id']; ?>" readonly required>
                                <input type="hidden" name="sid" value="<?php echo $_POST['sid']; ?>" readonly required>
                                <input type="hidden" name="sname" value="<?php echo $_POST['sname']; ?>" readonly required>
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
                                <input type="hidden" name="sid" value="<?php echo $_POST['sid']; ?>" readonly required>
                                <input type="hidden" name="sname" value="<?php echo $_POST['sname']; ?>" readonly required>
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
                            <input type="hidden" name="cid" value="<?php echo $_POST['cid']; ?>" readonly required>
                            <input type="hidden" name="rid" value="<?php echo $dow['id']; ?>" readonly required>
                            <input type="hidden" name="sid" value="<?php echo $_POST['sid']; ?>" readonly required>
                            <input type="hidden" name="sname" value="<?php echo $_POST['sname']; ?>" readonly required>
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

    

<?php } ?>
