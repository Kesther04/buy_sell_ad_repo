<?php
    $sel_don = $sel_ob->sel_id_pro($sid);
    if($sel_don){
        $dow = $sel_don->fetch_assoc();
        
        $selp = $sel_ob->sel_feed($sid,$dow['fullname']);
        $key_selp = mysqli_num_rows($selp);
?>

<div>
    <?php if ($key_selp <= 1) { ?>
        <?php echo mysqli_num_rows($selp); ?> Feedback  
    <?php }else{ ?>
        <?php echo mysqli_num_rows($selp); ?> Feedbacks  
    <?php } ?>
    

    <a href='../feedback/feedback?id=<?php echo $sid; ?>&name=<?php echo str_replace(' ','-',$dow['fullname']); ?>'>View All</a>
</div>


<?php  } ?>