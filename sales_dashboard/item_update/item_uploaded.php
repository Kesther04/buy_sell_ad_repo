<script src="../../js/jquery.js"></script>
<script src="../../js/ajax.js"></script>
<script src="../../js/snd_np_form.js"></script>

<?php
    require("../../class/sel_class.php");
    $sel_ob = new SEL();

    if ($_SERVER['REQUEST_METHOD']=="POST") {
    
        
        $iname = $_POST['sii'];
            
        
        $sel_dis = $sel_ob->sel_item_id($iname);
        if ($sel_dis) {
            while ($row = $sel_dis->fetch_assoc()) {

?>

    
<form class="itm_upld" action="backend_item_update.php" method="post" enctype="multipart/form-data">
    

    <div class="sec-div-container">

        <h1>UPDATE UPLOADED ITEM</h1>

        
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
                        <span>Select New Set of Images</span>
                        <input type="file" name="img[]" id="files"  multiple accept="image/jpeg, image/jpg, image/png, image/jfif">
                    </td>

                    
                </tr>

                <tr>
                    <td>
                        <span>Commodity Name</span><input type="text" name="iname" value="<?php echo  $im = str_replace('-',' ',$row['item_name']); ?>" readonly required>
                        <input type="hidden" name="id" value="<?php echo $row['id'];  ?>" required readonly>
                        <input type="hidden" name="uid" value="<?php echo $row['sel_id'];  ?>" required readonly>
                        
                        
                    </td>

                    <td><span>Price</span><input type="number" name="iprice" value="<?php echo  $row['price']; ?>"  required></td>

                    
                </tr>

                <tr>
                    <td><span>Item Category</span><input type="text" name="igroup" value="<?php  echo str_replace('-',' ',$row['item_cat']); ?>" readonly required></td>

                    <td>
                        <span>Main Item Category</span>
                        <input type="text" name="cat_group" value="<?php  echo str_replace('-',' ',$row['group_in_cat']); ?>" readonly required>
                    </td>

                    
                </tr>

                <tr>
                    <td>
                        <span>Commodity Description</span>
                        <textarea name="des"   required><?php echo $row['des']; ?></textarea>
                    </td>
                </tr>

                <?php
                    $sel_don = $sel_ob->sel_feat_id($row['id']);
                    if ($sel_don) {
                    
                    while($cow = $sel_don->fetch_assoc()){ 
                
                ?>
                <tr>
                    

                    <td>
                        <span><?php echo $cow['feature_name']; ?></span>
                        <input type="hidden" name="fn[]"  value="<?php echo $cow['feature_name']; ?>" required readonly>
                        <input type="text" name="fp[]" class="fp-brg" value="<?php  echo $cow['feature_prop']; ?>" readonly required>
                    </td>

                    <?php 
                        $sel_con = $sel_ob->cat_tb_all_id($cow['cat_id']);
                        while($dow = $sel_con->fetch_assoc()){

                        $nock = $dow['feature_name'];
                        $prock = $dow['feature_prop'];
                        $kes = explode("_",$prock);

                        
                    ?>                  
                    
                        <td>
                            
                            
                            <?php if ($prock == "***") { ?>
                                <span><?php  echo 'Enter Another '.$nock; ?></span>
                                <input type="text" name="fpr[]" >
                            <?php   }else { ?>
                                <span><?php  echo 'Select Another '.$nock; ?></span>
                                <select name="fpr[]" >
                                    <option value="nil"></option>
                                    <?php

                                        foreach ($kes as $key => $value) {

                                            if ($value == "YEAR89-CU") {
                                                $yr = date("Y");
                                                for ($i=1989; $i <= $yr; $i++) { 
                                                    echo '<option>'.$i.'</option>';
                                                }
                                                
                                            }
                                            elseif($value == "NUM1-INF"){
                                                for ($a=2; $a <= 10; $a++) { 
                                                    echo '<option>'.$a.'</option>';
                                                }
                                                
                                            }else {
                                                echo '<option>'.$value.'</option>';
                                            }
                                        }
                                        
                                    ?>
                                </select>
                            <?php } ?>
                        </td>
                    

                    <?php  } ?>

                    
                </tr>
                <?php } } ?>

            </table>

            
        </div>


        
        <div class="con-btn-div">
            <button class="con-btn">UPDATE</button>
        </div>
        
   
    </div>
</form>

<?php } } }  ?>
