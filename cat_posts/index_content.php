<?php  require("../../../session.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel='stylesheet' href='../../../css/style.css' media='all'>
  <link rel='stylesheet' href='../../../css/resp_style.css' media='all'>
  <?php        
    $pageName = basename(dirname($_SERVER['PHP_SELF']));   
  ?>
  <title><?php echo $pageName ?></title>
   
</head>
<body id="total-div">
  <?php require("../../header.php");  ?>
  
  <section class="main-container-prod-cat">
    <!-- this is the major container for  this commodity category -->
    <div class="fst-mcpc">
      
      <div class="inner-fst-mcpc">
        <!-- container for selecting ad to view  -->
        <div class="head">Categories</div>
        <div class="cat-ifm">
          <?php
            require('../../../class/sel_class.php');
            $sel_ob = new SEL();
            $sel_don =  $sel_ob->sel_catnamenogp($pageName);
            if ($sel_don->num_rows>0) {
              $dow = $sel_don->fetch_assoc();
              
              echo '<a href="../"><p>'.$dow['item_cat'].'</p></a>';

              $sel_con = $sel_ob->sel_namegp($dow['item_cat']);
              if ($sel_con) {
                
                while ($row = $sel_con->fetch_assoc()) {
                  $selt = $sel_ob->sel_catnamegp($row['group_in_cat']);
                  if ($row['group_in_cat'] == $pageName ) {

                    echo '<a href='.'../'.$row['group_in_cat'].'><p id="blue">';
                    echo str_replace('-',' ',$row['group_in_cat']).' | ';
                    if(mysqli_num_rows($selt) == 1){
                      echo  mysqli_num_rows($selt).' ad';
                    }else {
                      echo  mysqli_num_rows($selt).' ads';
                    } 
                    echo '</p></a>';
                  }else {
                      
                    
                    echo  '<a href='.'../'.$row['group_in_cat'].'><p>';
                    echo str_replace('-',' ',$row['group_in_cat']).' | ';
                    if(mysqli_num_rows($selt) == 1){
                      echo  mysqli_num_rows($selt).' ad';
                    }else {
                      echo  mysqli_num_rows($selt).' ads';
                    } 
                    echo '</p></a>';
                  }
                }
              }
            }

          ?>
        </div>
      </div>

      <div class="inner-fst-mcpc">

        <div class="price-neg">
          <h2>Price</h2>

          <div class="opt-price-neg">
            <input type="number" name="" id="min" placeholder="Min"> - <input type="number" name="" id="max" placeholder="Max">

            <input type="radio" name="sort" id="fsort">
          </div>

          <div class="def-price-neg">
            <input type="hidden" name="pn" class="pn" value="<?php echo $pageName; ?>" required readonly>
  
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

      <form  class="dis-feat" action="../../commodity_feat.php" method="post">
        <?php
          $sel_cat = $sel_ob->cat_tbin_cat($pageName);
          if ($sel_cat) {
            while ($scow = $sel_cat->fetch_assoc()) {
        ?>
          <?php  if ($scow['feature_prop'] == "***") { ?>
            <?php echo ""; ?>
          <?php }else{ ?>
            <div class="inner-fst-mcpc">
              
              <div class="feat-sel">
                <?php 
                  echo '<h2>'.$scow['feature_name'].'</h2>'; 
                ?>

                <div class="inner-feat-sel">
                  
                    <input type="hidden" name="pn" class="pn" value="<?php echo $pageName; ?>" required readonly>
                    <?php
                      $prock = $scow['feature_prop'];
                      $kes = explode("_",$prock);
                    
                      foreach ($kes as $key => $value) {

                        if ($value == "YEAR89-CU") {
                          $yr = date("Y");
                          for ($i=1989; $i <= $yr; $i++) { 
                            echo 
                            '<div class="main-inner-feat-sel">
                                <input type="checkbox" name="sort[]" value="'.$i.'|'.$scow['feature_name'].'|'.$scow['id'].'*'.'">'.
                                $i.
                              '</div>';
                          }
                            
                        }
                        elseif($value == "NUM1-INF"){

                          for ($a=2; $a <= 10; $a++) { 
                            echo 
                            '<div class="main-inner-feat-sel">
                                <input type="checkbox" name="sort[]" value="'.$a.'|'.$scow['feature_name'].'|'.$scow['id'].'*'.'">'.
                                $a.
                              '</div>';
                          }
                            
                        }else {
                          echo 
                          '<div class="main-inner-feat-sel">
                              <input type="checkbox" name="sort[]" value="'.$value.'|'.$scow['feature_name'].'|'.$scow['id'].'*'.'">'.
                               $value.
                            '</div>';
                        }
                      }
                    ?>

                  
                </div>

                
              </div>
            </div>
          <?php } ?>
        <?php }} ?>
        
      </form>
     

    </div>
    
    <div class="snd-mcpc">
      <!-- container for viewing ad of this commodity category -->
      <h1><?php echo str_replace('-',' ',$pageName).' in Nigeria' ?></h1>

      <div class="inner-snd-mcpc">
        <?php require('../../commodity.php'); ?>
      </div>
    </div>
  </section>

  <section class="last-container">
    <!-- the last container of the page / this container is the footer -->
    <?php require('../../footer.php'); ?>
  </section>
  
  <script src='../../../js/jquery.js'></script>
  <script src='../../../js/rev.js'></script>
  <script src='../../../js/ajax.js'></script>
  <script src='../../../js/dash.js'></script>
</body>
</html>