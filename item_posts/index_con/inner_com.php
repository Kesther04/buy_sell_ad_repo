<div class="ssc-main">
    <?php
        $sel_trend = $sel_ob->sel_catnameidgp($sid,$group);
        if ($sel_trend) {
            while ($tow = $sel_trend->fetch_assoc()) {
    
    ?>
        <?php require("../../two_step_main_commodity.php"); ?>
    <?php  } }  ?>
</div>