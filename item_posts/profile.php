
<?php 
    $sel_con = $sel_ob->sel_item_tb($pana,$sid);
    if ($sel_con) {
        $row = $sel_con->fetch_assoc();
        $uid = $row['sel_id'];

        $sel_don = $sel_ob->sel_id_pro($uid);
        if ($sel_don) {
            $dow = $sel_don->fetch_assoc();
?>
<a href="../../item_posts/<?php echo $foldName; ?>">
    <div class='profile-snd-aicp' >
        <!-- profile of the sales person will be shown here -->
        
        <?php
            
            $let = explode('/',$dow['date']);
            $dlet = $let[0];
            $mlet = $let[1];
            $ylet = $let[2];
            if ($dow['img'] == "0") {
        ?>

            <div class="prof-det-img">
                <img src="../../images/user.svg">
            </div>
        <?php  }else { ?>

            <div class="prof-det-img">
                <img src="../../pics/profile/<?php echo  $dow['img']; ?>" >
            </div>
        <?php } ?>
        
        <div class="prof-det-content">

            <span><?php  echo $dow['fullname'];?></span>
            <span id="prof-time-length"><?php require("../time_length.php"); ?></span>

        </div>
    </div>
</a>

    <div class='btn-snd-aicp'>
        <button id="show-con">SHOW CONTACT</button>
        <button id="hide-con"><?php echo $row['pnumber']; ?></button>

        <?php  if ($_SESSION['id'] == $sid) { ?>
            <a href="../../sales_dashboard/all_chat.php">
                <button>START CHAT</button>
            </a>
        <?php }else {  ?>
            <a href="../../sales_dashboard/chats.php?id=<?php echo $uid; ?>&name=<?php echo str_replace(' ','-',$dow['fullname']); ?>">
                <button>START CHAT</button>
            </a>
        <?php } ?>
    
    </div>
<?php  }  ?>
<?php } ?>

