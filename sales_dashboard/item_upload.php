<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/sdash.css" media="all">
    <link rel="stylesheet" href="../css/sdash_rep.css" media="all">
    <script src="../js/jquery.js"></script>
    <script src="../js/rev.js"></script>
    <script src="../js/ajax.js"></script>
    <script src="../js/snd_dash.js"></script>
    
    <!-- <script src="../js/metro.js"></script> -->
    <title>DASHBOARD</title>
    
</head>
<body>
    

<?php 
    require("sales_dashboard_layout.php"); 
    require("../class/sel_class.php");
?>

<div id="masag">
    <div class="msg">    
        <div class="msa"></div>
        <a href="item_upload.php" title="return to item upload page"><button class="aj-btn">COMPLETE</button></a>
    </div>
</div>

<section class="main-div-container">

    <form  class="full_itm_upl" action="item_upload_fold/full_item_upload.php" method="post" enctype="multipart/form-data">
    

        <div class="sec-div-container">

            <h1>SELECT CATEGORY</h1>

    
            <div class="fir-div-container">
                <table>

                    <tr>
                        <td>
                        <?php 
                            $sel_ob = new SEL();
                            $sel_con = $sel_ob->sel_all_grpcat();
                            if ($sel_con) {
                        ?>
                            <span>Item Category</span>
                            <select name="igroup" id="cat" required>
                                <option></option>
                                
                                <?php       
                                    while($row = $sel_con->fetch_assoc()){
                                        $ic = $row['item_cat'];
                                ?>
                                    <option value='<?php echo $ic; ?>'><?php echo str_replace('-',' ',$row['item_cat']); ?></option>
                                <?php }  ?>
                            </select>
            
                        <?php } ?>

                        </td>

                        <td class="cat-typ">
                            <span>Main Item Category</span>
                            <select name="inngroup" id="item"  required>
                                    <option value=""></option>
                                    
                            </select>
                        </td>

                        
                    </tr>


                </table>
            </div>
            

       
            <div class="con-btn-div">
                <button class="con-btn">ENTER</button>
            </div>
    
   
        </div>
    </form>


    <div class="seco-div-container"></div>
</section>

    
</body>
</html>