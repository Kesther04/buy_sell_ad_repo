    <script src="../../js/jquery.js"></script>
    <script src="../../js/rev.js"></script>

    <?php

        require("../../class/sel_class.php");
        $sel_ob = new SEL();
        
        if (isset($_GET['items'])) {


    ?>

        <?php
            $item = explode('|',$_GET['items']);
            $uid = $item[0];
            $group = $item[1];

            $sel_upda = $sel_ob->sel_nameidgp($uid,$group);
            if ($sel_upda) {
                echo "<option></option>";
                while ($row = $sel_upda->fetch_assoc()) { 
                    $im = $row['group_in_cat'];
        ?>
                <option value="<?php echo $uid.'|'.$im; ?>" ><?php echo str_replace('-',' ',$im); ?></option>
        <?php   }  }  ?>
        
    <?php   } ?>