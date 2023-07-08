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
    <script src="../js/nim.js"></script>
    <script src="../js/snd_dash.js"></script>
    <title>DASHBOARD</title>
</head>
<body>

<?php require("sales_dashboard_layout.php"); ?>


<div id="masag-cot">
    <div class="snd-inner-masag-ct">
        <div class="msg">  
            <div id = "pre-inner-masag-cot-back">
                <div class="inner-masag-cot-back" title="back to page">
                    <img src="../images/arro.svg" width="30" class="sec-img">
                    <img src="../images/arro-fill.svg" width="30" class="fir-img">
                </div>
            </div>

            <div id="preview" ></div>  

            <form action="user/backend_img_profile.php" method="post" enctype="multipart/form-data">
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

        <div class="fst-change-prof">
            <div>
                View Saved Ads 
                <a href="saved"><span>&#9776;</span></a>
            </div>

            

            <div>
                Change / Update Profile Info 
                <a href="profile_update"><span>&#9776;</span></a>
            </div>
        </div>
        
        <div class="prof-det">
            <!-- profile picture and name -->
            <div class="prof-det-img" title="update your profile picture" >
                <?php
                    require("../class/sel_class.php");
                    $sel_ob = new SEL();
                    $sel_con = $sel_ob->sel_id_pro($_SESSION['id']);
                    if ($sel_con) {
                        
                        $row = $sel_con->fetch_assoc();
                        if ($row['img'] == "0") {
                ?>
                    <img src="../images/user.svg">
                <?php  }else { ?>
                    <img src="../pics/profile/<?php echo $row['img']; ?>">
                <?php } } ?>
                
            </div>
            <div class="prof-det-name"><?php echo $_SESSION['name']; ?></div>
            
        </div>

        <div class="inner-sec-div-con">
            <!-- contact,feedbacks,about seller,following and other personal details -->

            <table>
               
                <tr>
                    <td><span>Email Address</span> <?php echo $_SESSION['email']; ?></td>
                </tr>    
                
                <tr>
                    <td><span>Contact </span> <?php echo $_SESSION['pno']; ?></td>
                </tr>    
            </table>
            
            <table>
                <tr>
                    <td><span>Location</span> <?php echo $_SESSION['state'].','.$_SESSION['lga']; ?></td>
                </tr>
                
                <tr>
                    <td><span>Following</span>  0</td>
                </tr>
            </table>
            
        </div>

        <div class="fst-change-prof">
            <div>
                <?php
                    $prn = str_replace(" ","-",$_SESSION['name']);
                    $fprnan = $prn.'-'.$_SESSION['id'];
                ?>
                View User Ads 
                <a href="../item_posts/<?php echo $fprnan; ?>"><span>&#9776;</span></a>
            </div>
        </div>
        
    </div>
  
</section>



<script>
    function getImagePreview(event){
        var image = URL.createObjectURL(event.target.files[0]);
        var imagediv = document.getElementById('preview');
        var newimg = document.createElement('img');
        imagediv.innerHTML='';
        newimg.src=image;
        newimg.width="250";
        imagediv.appendChild(newimg);
        imagediv.style="border-radius:100%";
    }
</script>
    
</body>
</html>