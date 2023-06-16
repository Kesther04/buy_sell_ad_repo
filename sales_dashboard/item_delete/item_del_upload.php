<script src="../../js/jquery.js"></script>
<script src="../../js/ajax.js"></script>
<script src="../../js/snd_np_form.js"></script>

<?php

if ($_SERVER['REQUEST_METHOD']=="POST") {
    $iname = $_POST['sii'];

    require("../../class/sel_class.php");
    $sel_ob = new SEL();
    $sel_dis = $sel_ob->sel_item_id($iname);
    if ($sel_dis) {
        while ($row = $sel_dis->fetch_assoc()) {
?>


    <form class="itm_deld" action="backend_item_delete.php" method="post" enctype="multipart/form-data">
        

        <div class="sec-div-container">

            <h1>DELETE UPLOADED ITEM</h1>


                
            <div class="fir-div-container">

                <div class="prod-img-show">

                    
                    <?php  
                        $sel_img = $sel_ob->sel_img_id($row['id']);
                        if ($sel_img) {
                    ?>

                    <div class="img-result">
                        <?php while ($dow = $sel_img->fetch_assoc()) { ?>
                            
                            <img src="../../pics/<?php echo $dow['img'];  ?>" >
                        
                        <?php } ?>
                    </div>

                    <?php   }  ?>
                
                </div>



                <table>

                    

                    <tr>
                        <td>
                            <span>Item Name</span><input type="text" name="iname" value="<?php echo  $im = str_replace('-',' ',$row['item_name']); ?>" readonly required>
                            <input type="hidden" name="id" value="<?php echo $row['id'];  ?>" required readonly>
                            <input type="hidden" name="uid" value="<?php echo $row['sel_id'];  ?>" required readonly>
                            
                            
                        </td>

                        
                    </tr>

                    <tr>
                        <td><span>Item Category</span><input type="text" name="igroup" value="<?php  echo str_replace('-',' ',$row['item_cat']); ?>" readonly required></td>

                        <td><span>Main Item Category</span><input type="text" name="cat_group" value="<?php  echo str_replace('-',' ',$row['group_in_cat']); ?>" readonly required></td>

                        
                    </tr>


                    <tr>
                        <td><span>Item Price</span><input type="text" name="iprice" value="<?php echo  'N'.number_format($row['price'],3); ?>"  readonly required></td>
                    </tr>

                </table>

            </div>
            
            <div class="con-btn-div">
                <button class="con-btn">DELETE</button>
            </div>
        
        </div>
    </form>





<?php } }  } ?>