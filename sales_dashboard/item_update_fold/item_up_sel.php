<script src="../../js/jquery.js"></script>
<script src="../../js/ajax.js"></script>

<?php
    require("../../class/sel_class.php");
    $sel_ob = new SEL();

    if (isset($_GET['items'])) {
    

?>


    <?php
        $item = explode('|',$_GET['items']);
        $uid = $item[0];
        $group = $item[1];

        $sel_upda = $sel_ob->sel_catnameidgp($uid,$group);
        if ($sel_upda) {
            echo "<option></option>";
            while ($row = $sel_upda->fetch_assoc()) {
                    
                $im = str_replace('-',' ',$row['item_name']);
    ?>
            <option value="<?php echo $row['id'].'|'.$row['item_name']; ?>"><?php echo $im; ?></option>
    <?php   }  }  ?>
                      


    


<?php  }  ?>