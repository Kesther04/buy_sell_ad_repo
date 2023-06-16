
    <!-- save product to view in your saved -->

    <?php if (!isset($_SESSION['id'])) { ?>
        <a href="sales_auth/login/login">
            <img src="../../images/save.svg" title="save commodity">
        </a>
    <?php }else{ ?>
    
    <?php
        $selSave = $sel_ob->sel_save_id($id,$_SESSION['id']);
    ?>
    
    <?php if ($selSave->num_rows>0) { ?>
        <form class="sdel" action="../../saved/del_saved.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>" required readonly>
            <button><img src="../../images/save-fill.svg" title="remove from saved"></button>
        </form>
        
    <?php }else{ ?>
        <form class="sinp" action="../../saved/input_saved.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>" required readonly>
            <button><img src="../../images/save.svg" title="save commodity"></button>
        </form>
        
    <?php } ?>
    
    <?php } ?>
    
