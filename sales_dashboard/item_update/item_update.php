<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/sdash.css" media="all">
    <link rel="stylesheet" href="../../css/sdash_rep.css" media="all">
    <script src="../../js/jquery.js"></script>
    <script src="../../js/ajax.js"></script>
    <script src="../../js/rev.js"></script>
    <script src="../../js/metro.js"></script>
    <script src="../../js/snd_dash.js"></script>
   
    <title>DASHBOARD</title>
    
</head>
<body>

<?php 
    require("../sales_dashboard_layout.php"); 
    require("../../class/sel_class.php");
    $sel_ob = new SEL();
?>

    <div id="masag">
        <div class="msg">    
            <div class="msa"></div>
            <button class="aj-btn"><a href="item_update.php" title="return to item update page">COMPLETE</a></button>
        </div>
    </div>

    <section class="main-div-container">

            
        <div class="sec-div-container">
            <h1>SELECT ITEM TO UPDATE</h1>

            <div class="inner-secdc">
                <form class="upd-itm" action="item_uploaded.php" method="post">

                    <div class="fir-div-container">
                        <table>
                            <tr>
                                <td>
                                    <span>Item Category</span>
                                    <select name="igroup" id="igroup" required>
                                        <option></option>
                                        <?php
                                            $uid = $_SESSION['id'];
                                            $sel_upd = $sel_ob->sel_nselup_gp($uid);
                                            if ($sel_upd) {
                                                while ($row = $sel_upd->fetch_assoc()) {
                                                    
                                                    $im = str_replace('-',' ',$row['item_cat']);
                                        ?>
                                        <option value="<?php echo $uid.'|'.$row['item_cat']; ?>" ><?php echo $im; ?></option>
                                        <?php   }  }  ?>
                                        
                                    </select>
                                </td>

                                <td>
                                    <span>Main Item Category</span>
                                    <select name="smic" id="smic" required></select>
                                </td>

                                <td>
                                    <span>Select Item</span>
                                    <select name="sii" id="sii" required></select>
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