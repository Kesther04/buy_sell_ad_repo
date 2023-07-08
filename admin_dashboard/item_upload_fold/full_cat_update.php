<?php if ($_SERVER['REQUEST_METHOD']=="POST") { ?>

    <script src="../js/jquery.js"></script>
    <script src="../js/feat.js"></script>
    <script src="../js/ajax.js"></script>
    <?php
        $icat = $_POST['icat'];
        $micat = $_POST['micat'];

        require("../../class/sel_class.php");
        $sel_ob = new SEL();
        $sel_con = $sel_ob->cat_tb_all($icat,$micat);
        if ($sel_con) {
            
        

    ?>

    <form  class="cat_upd" action="item_upload_fold/backend_cat_update.php" method="post" enctype="multipart/form-data">
    

        <div class="sec-div-container">

            <h1>UPDATE CATEGORY</h1>

    
            <div class="fir-div-container upp">

                
                <table>
                    <input type="hidden" name="icat" value="<?php echo $icat; ?>" required readonly>
                    <input type="hidden" name="micat" value="<?php echo $micat; ?>" required readonly>
                    <?php  while ($row = $sel_con->fetch_assoc()) {  ?>

                        <tr>
                            <td>
                                <span>Feature Name</span>
                                <input type="text" name="fnm[]" value="<?php echo 'Update '.$row['feature_name']; ?>" readonly required>
                                <input type="hidden" name="id[]" value="<?php echo $row['id']; ?>">
                            </td>


                            <td title="remember to divide all properties with underscore">
                                <span>Feature Properties</span>
                                <textarea name="fpr[]"  required><?php echo $row['feature_prop']; ?></textarea>
                            </td>
                        </tr>
                    <?php  } ?>
                </table>

                
                <input type="button" id="ccl" value="Add More Fields">
            </div>

            
            <div class="con-btn-div">
                <button class="con-btn">UPDATE</button>
            </div>
        </div>
    </form>


<?php } }?>
