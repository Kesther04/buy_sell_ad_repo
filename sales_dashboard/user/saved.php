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
    <script src="../../js/nim.js"></script>
    <title>DASHBOARD</title>
</head>
<body id="total-div">

<?php 
    require("../sales_dashboard_layout.php"); 
    require("../../class/sel_class.php");
    $sel_ob = new SEL();
?>


<div id="masag-cot">
    <div class="snd-inner-masag-ct">
        <div class="msg">  
            <div id = "pre-inner-masag-cot-back">
                <div class="inner-masag-cot-back" title="back to page">
                        <img src="../../images/arro.svg" width="30" class="sec-img"><img src="../../images/arro-fill.svg" width="30" class="fir-img">
                </div>
            </div>

            <div id="preview" ></div>  

            <form action="backend_img_profile.php" method="post" enctype="multipart/form-data">
                <div class="msa">
                    <input type="file" name="image"  accept="image/jpeg, image/jpg, image/png, image/jfif" required onchange=getImagePreview(event)>
                    <input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>" required readonly>
                </div>
            
                <button class="aj-btn">COMPLETE</button>
            </form>
        </div>
    </div>

</div>



<section class="main-div-container">

   
    <div class="sec-div-container">
        <h1>Saved Ads</h1>

        <?php
            $sel_don = $sel_ob->sel_saved($_SESSION['id']);
            if ($sel_don->num_rows>0) {
                while($dow = $sel_don->fetch_assoc()){
                
                $sel_con = $sel_ob->sel_item_id($dow['item_id']);
                if ($sel_con) {
                    $row = $sel_con->fetch_assoc();
        
                    if ($dow['item_id'] == !isset($row['id'])) {
                        echo "";
                    }else {
                        
                    
        ?>
        
        <div class="saved-itm">
            <div class="fst-saved-itm">
                <!-- for the commodity info -->
                <div class="img-fsi">
                    
                    <?php
                        $snm = str_replace(' ','-',$row['sel_name']);
                        $siid = $snm.'-'.$row['sel_id'];
                    ?>
                    <a href="../../item_posts/<?php echo $siid; ?>/<?php echo $row['item_name']; ?>">
                        <img src="../../pics/<?php echo $row['img']; ?>">
                    </a>

                </div>

                <div class="con-fsi">
                    
                    <div>
                        <p><?php echo str_replace('-',' ',$row['item_name']); ?></p>
                        <p><?php echo 'N'.number_format($row['price'],3) ?></p>
                    </div>

                    <div>
                        <img src="../../images/location.svg"><?php echo $row['location']; ?>
                    </div>

                    
                </div>
                <div class="rem-fsi" >
                    <form class="sdel" action="../../saved/del_saved.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>" required readonly>
                        <button title="remove from saved">
                            &times;
                        </button>
                    </form>
                   
                </div>
            </div>

            <div class="snd-saved-itm">
                <!-- for the chat and show of contact -->
                
                <div class='btn-snd-aicp'>
                    <button title='contact no. of seller'><?php echo $row['pnumber']; ?></button>

                    
                    <?php  if ($_SESSION['id'] == $row['sel_id']) { ?>
                        <a href="../../sales_dashboard/chat/">
                            <button>START CHAT</button>
                        </a>
                    <?php }else {  ?>
                        <a href="../../sales_dashboard/chat/chats?id=<?php echo $row['sel_id']; ?>&name=<?php echo str_replace(' ','-',$row['sel_name']); ?>">
                            <button>START CHAT</button>
                        </a>
                    <?php } ?>
    
                </div>
            </div>
        </div>
        <?php } } } } ?>
        
    </div>
  
</section>

</body>
</html>