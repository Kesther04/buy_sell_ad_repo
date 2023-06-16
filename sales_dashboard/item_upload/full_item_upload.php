<?php
    session_start();
    if ($_SERVER['REQUEST_METHOD']=="POST") {
        $icat = $_POST['igroup'];
        $imcat = $_POST['inngroup'];

        require("../../class/sel_class.php");
        $sel_ob = new SEL();

        $sel_con = $sel_ob->cat_tb_all($icat,$imcat);
        if ($sel_con) {
    
        
?>

    <link rel="stylesheet" href="../../css/sdash.css" media="all">
    <link rel="stylesheet" href="../../css/sdash_rep.css" media="all">
    <script src="../../js/jquery.js"></script>
    <script src="../../js/np_form.js"></script>
    <script src="../../js/ajax.js"></script>


    <form  class="itm_upl" action="backend_item_upload.php" method="post" enctype="multipart/form-data">
        
        <div class="sec-div-container">

            <h1>UPLOAD ITEM</h1>
    
            <div class="fir-div-container">

                <table>

                    <tr>
                        <td>
                            <span>Image</span>
                            <input type="file" name="img[]" id="files" required multiple accept="image/jpeg, image/jpg, image/png, image/jfif">
                        </td>

                        <td class="img-result img-res-height"></td>
                    </tr>


                    <tr>
                        <td>
                            <span>Commodity Name</span>
                            <input type="text" name="iname" required placeholder="Enter the Commodity Name">
                            <input type="hidden" name="igroup" required readonly value="<?php echo $icat; ?>">
                            <input type="hidden" name="inngroup" required readonly value="<?php echo $imcat ?>">
                            
                        </td>
                        
                        <td><span>Price</span><input type="number" name="iprice" placeholder="add Commodity Price" required></td>

                    </tr>
                    
                    <?php 
                        while($row = $sel_con->fetch_assoc()){

                            $nock = $row['feature_name'];
                            $prock = $row['feature_prop'];
                            $kes = explode("_",$prock);

                            

                            
                    ?>
                            

                       
                    <tr>
                        <td>
                            <span><?php  echo $nock; ?></span>
                            <input type="hidden" name="fn[]" required readonly value="<?php echo $nock; ?>">
                            <?php if ($prock == "***") { ?>
                                <input type="text" name="fp[]" required>
                            <?php   }else { ?>
                                <select name="fp[]" required>
                                    <option></option>
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
                            <input type="hidden" name="cid[]" required readonly value="<?php echo $row['id']; ?>">
                        </td>
                    </tr>

                    <?php  } ?>
                    
                    <tr>
                       
                        <td>
                            <span>Contact Number</span>
                            <input type="number" name="pno" required readonly value="<?php echo $_SESSION['pno']; ?>">
                            <input type="hidden" name="uname" readonly required value="<?php echo $_SESSION['name']; ?>">
                            <input type="hidden" name="uid" readonly required value="<?php echo $_SESSION['id']; ?>">
                        </td>
                    
                        <td>
                            <span>Location</span>
                    
                            <input type="text" name="locat" id="state" value="<?php echo $_SESSION['state'].','.$_SESSION['lga']; ?>" readonly required>
                        
                        </td>

                    </tr>

                    <tr>
                        <td>
                            <span>Commodity Description</span>
                            <textarea name="des" placeholder="Enter the description of the commodity your uploading" required></textarea>
                        </td>

                    </tr>

                </table>

                
                <div class="con-btn-div">
                    <button class="con-btn">SUBMIT</button>
                </div>
            </div>

        </div>
    </form>

    

<?php  } } ?>