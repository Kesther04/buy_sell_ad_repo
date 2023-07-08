<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/sdash.css" media="all">
    <link rel="stylesheet" href="../css/sdash_rep.css" media="all">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="../js/jquery.js"></script>
    <script src="../js/ajax.js"></script>
    <script src="../js/metro.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="../js/snd_dash.js"></script>
    <script>
        $(document).ready(function(){

            new DataTable('.myTable');
        })
    </script>
    <title>DASHBOARD</title>
</head>
<body>
    
<?php require("sales_dashboard_layout.php"); ?>


<div id="masag-cot">

    <div class="snd-inner-masag-ct">
        <div class="msg"></div>
    </div>
</div>


<section class="main-div-container">

    <?php 
        require("../class/sel_class.php");
        $sel_ob = new SEL(); 
        $sel_con = $sel_ob->sel_all_item($_SESSION['id']);
        if ($sel_con) {
              
    ?>

    <div class="sec-div-container">
        <div class="line-div-container">
            
            <table class="myTable" >
                <thead>
                    <tr id="top-line-div-table">
                        <th></th>
                        <th>COMMODITY_NAME</th>
                        <th>ITEM_CATEGORY</th>
                        <th>MAIN_ITEM_CATEGORY</th>
                        <th>PRICE</th>
                        <th>DATE_ADDED</th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php while ($row = $sel_con->fetch_assoc()) { ?>
                    
                        <tr>
                            
                            
                            <td>
                                <?php
                                    $snm = str_replace(' ','-',$_SESSION['name']);
                                    $siid = $snm.'-'.$_SESSION['id'];
                                ?>
                                <a href="../item_posts/<?php echo $siid; ?>/<?php echo $row['item_name']; ?>">
                                    <img src="../pics/<?php  echo $row['img']; ?>" width="100">
                                </a>
                            </td>
                            <td><?php echo str_replace('-',' ',$row['item_name']); ?></td>
                            <td><?php echo str_replace('-',' ',$row['item_cat']); ?></td>
                            <td><?php echo str_replace('-',' ',$row['group_in_cat']); ?></td>
                            <td><?php echo 'N'.number_format($row['price'],3); ?></td>
                            <td><?php echo $row['date']; ?></td>
                            
                            
                            
                        </tr>
                    
                    <?php  } ?>
                
                </tbody>
            </table>
        </div>
    </div>

    <?php } ?>
</section>

</body>
</html>
