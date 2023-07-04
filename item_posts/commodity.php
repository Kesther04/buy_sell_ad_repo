<div class="ssc-main">
    <?php
        $sel_con = $sel_ob->sel_item_tb($pana,$sid);
        if ($sel_con) {
            $row = $sel_con->fetch_assoc();
                $id = $row['id'];
                $group = $row['group_in_cat'];
        
        $sel_trend = $sel_ob->sel_all_item_grp($group);
        if ($sel_trend) {
            while ($tow = $sel_trend->fetch_assoc()) {
    
    ?>
        <?php require("../../two_step_main_commodity.php"); ?>
    <?php  } } } ?>
</div>