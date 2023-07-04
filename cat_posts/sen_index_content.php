<?php require("../../session.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel='stylesheet' href='../../css/style.css' media='all'>
  <link rel='stylesheet' href='../../css/resp_style.css' media='all'>
  <?php        
    $pageName = basename(dirname($_SERVER['PHP_SELF']));   
  ?>
  <title><?php echo $pageName ?></title>
   
</head>
<body id="total-div">
  <?php require("../sen_header.php");  ?>
  
  <section class="main-container-prod-cat">
    <!-- this is the major container for   commodity category -->
    <div class="fst-mcpc">
      
      <div class="inner-fst-mcpc">
        <!-- container for selecting ad to view  -->
        <div class="head">Categories</div>
        <div class="cat-ifm">
          <?php echo '<a href=""><p id="blue">'.$pageName.'</p></a>'; ?>
          <?php
            require('../../class/sel_class.php');
            $sel_ob = new SEL();
            $sel_con = $sel_ob->sel_namegp($pageName);
            if ($sel_con) {
              while ($row = $sel_con->fetch_assoc()) {
                $selt = $sel_ob->sel_catnamegp($row['group_in_cat']);

                echo '<a href='.$row['group_in_cat'].'><p>';
                echo str_replace('-',' ',$row['group_in_cat']).' | ';
                if(mysqli_num_rows($selt) == 1){
                  echo  mysqli_num_rows($selt).' ad';
                }else {
                  echo  mysqli_num_rows($selt).' ads';
                } 
               echo '</p></a>';
              }
            }
          ?>
        </div>
      </div>

      <div class="inner-fst-mcpc">

        <div class="price-neg">
          <h2>Price</h2>

          <input type="hidden" name="pn" class="pn" value="<?php echo $pageName; ?>">

          <div class="opt-price-neg">
            <input type="number" name="" id="min" placeholder="Min"> - <input type="number" name="" id="max" placeholder="Max">

            <input type="radio" name="sort" id="fsort">
          </div>

          <div class="def-price-neg">
            
  
            <div class="inner-def-price-neg">
              <input type="radio" name="sort" id="asort" value="0|10000"><span>Under 10K</span>
            </div>
            
            <div class="inner-def-price-neg">
              <input type="radio" name="sort" id="bsort" value="10000|100000"><span>10 - 100K</span>
            </div>
            
            <div class="inner-def-price-neg">
              <input type="radio" name="sort" id="csort" value="100000|5000000"><span>100K - 5M</span>
            </div>  
            
            <div class="inner-def-price-neg">
              <input type="radio" name="sort" id="dsort" value="5000000|30000000"><span>5 - 30M</span>
            </div>


            
            <div class="inner-def-price-neg">
              <input type="radio" name="sort" id="esort" value="30000000"><span>Above 30M</span>
            </div>
          
          </div>
        </div>
      </div>

    </div>

    <div class="snd-mcpc">
      <!-- container for viewing ad of this commodity category -->
      <h1><?php echo str_replace('-',' ',$pageName).' in Nigeria' ?></h1>

      <div class="snd-mcpc-cat-img">
        <?php
          $sel_cat_img = $sel_ob->cat_tb_itmcat($pageName);
          if ($sel_cat_img) {$cdow = $sel_cat_img->fetch_assoc();
        ?>
          <?php if ($cdow['ic_img'] == '0') { echo "<div class='cat-img'></div>"; }else{ ?>
            <div class="cat-img">
              <img src="../../pack_image/<?php echo $cdow['ic_img']; ?>">
            </div>
          <?php } ?>
        <?php } ?>
      </div>

      <div class="inner-snd-mcpc">
        <?php require('../sen_commodity.php'); ?>
      </div>
    </div>
  
  </section>

  <section class="last-container">
    <!-- the last container of the page / this container is the footer -->
    <?php require('../sen_footer.php'); ?>
  </section>

  <script src='../../js/jquery.js'></script>
  <script src='../../js/sen_rev.js'></script>
  <script src='../../js/dash.js'></script>
  <script src='../../js/ajax.js'></script>
</body>
</html>