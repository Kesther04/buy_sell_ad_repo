<div class="ssc-main">
    <?php
        $sel_trend = $sel_ob->sel_all_item($sid);
        if ($sel_trend) {
            while ($tow = $sel_trend->fetch_assoc()) {
    
    ?>
        <?php require("../../two_step_main_commodity.php"); ?>
    <?php  } }  ?>
</div>