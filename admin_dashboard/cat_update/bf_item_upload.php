
<?php 
    require("../../class/sel_class.php");
    $sel_ob = new SEL();

    if (isset($_GET['items'])) {
    
        $sel_don = $sel_ob->cat_tb_grpcat($_GET['items']);

        if ($sel_don) {
?>
    <option></option>
<?php
            while($dow = $sel_don->fetch_assoc()){
                $gc = $dow['group_in_cat'];
?>
    <option value='<?php echo $gc; ?>'><?php echo str_replace('-',' ',$dow['group_in_cat']); ?></option>

<?php } } } ?>

