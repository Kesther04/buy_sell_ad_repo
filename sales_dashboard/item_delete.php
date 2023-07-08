<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/sdash.css" media="all">
    <link rel="stylesheet" href="../css/sdash_rep.css" media="all">
    <script src="../js/jquery.js"></script>
    <script src="../js/ajax.js"></script>
    <script src="../js/rev.js"></script>
    <script src="../js/metro.js"></script>
    <script src="../js/snd_dash.js"></script>
    <title>DASHBOARD</title>
    
</head>
<body>

<?php 
    require("sales_dashboard_layout.php");
    require("../class/sel_class.php");
    $sel_ob = new SEL();
?>


<div id="masag">
    <div class="msgas">    
        
        <div style="font-weight:bold;">
            <p>ARE YOU SURE YOU WANT TO DELETE THIS ITEM DETAILS</p>
        </div>
        <div class="inner-secdc-del">
            <form action="item_delete_fold/backend_sure_item_delete.php" method="post">
                <div class="msa"></div>
                <button class="aj-btn">Yes</button>
            </form>
            <button class="aj-btn"><a href="item_delete.php">No</a></button>
        </div>

    </div>
</div>

<section class="main-div-container">

        
    <div class="sec-div-container">
        <h1>SELECT ITEM TO DELETE</h1>

        <div class="inner-secdc">
            <form class="del-itm" action="item_delete_fold/item_del_upload.php" method="post">

            <div class="fir-div-container">
                <table>
                    <tr>
                    <td>
                        <span>Item Category</span>
                        <select name="igroup" class="con-btnn" id="igroup" required>
                            <option></option>
                            <?php
                                $uid = $_SESSION['id'];
                                $sel_upd = $sel_ob->sel_nselup_gp($uid);
                                if ($sel_upd) {
                                    while ($row = $sel_upd->fetch_assoc()) {
                                        
                                        $im = str_replace('-',' ',$row['item_cat']);
                            ?>
                            <option value="<?php echo $uid.'|'.$im; ?>" ><?php echo $im; ?></option>
                            <?php   }  }  ?>
                            
                        </select>
                    </td>
                    
                    <td>
                        <span>Main Item Category</span>
                        <select name="smic" id="smic" required>   
                        </select>
                    </td>

                    <td>
                        <span>Select Item</span>
                        <select name="sii" id="sii" required>    
                        </select>
                    </td>
                    </tr>
                    
                </table>
            </div>
            
            <div class="con-btn-div">
                <button class="con-btn">VIEW</button>
            </div>
            </form>

        </div>
        
    </div>

    <div class="seco-div-container"></div>

</section>


</body>
</html>