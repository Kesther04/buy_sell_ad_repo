<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/sdash.css" media="all">
    <link rel="stylesheet" href="../../css/sdash_rep.css" media="all">
    <script src="../../js/jquery.js"></script>
    <script src="../../js/feat.js"></script>
    <script src="../../js/ajax.js"></script>

    
    <!-- <script src="../../../js/metro.js"></script> -->
    <title>DASHBOARD</title>
    
</head>
<body>

<?php require("../admin_dashboard_layout.php"); ?>

<div id="masag">
    <div class="msg">    
        <div class="msa"></div>
        <a href="cat_upload.php" title="return to page"><button class="aj-btn">COMPLETE</button></a>
    </div>
</div>

<section class="main-div-container">

    <form  class="cat_upl" action="backend_cat_upload.php" method="post" enctype="multipart/form-data">
    

        <div class="sec-div-container">

            <h1>CREATE CATEGORY</h1>

    
            <div class="fir-div-container">
                <table>

                    <tr>
                        <td>
                            <span>Item Category</span>
                            <input type="text" name="icat"  required>
                        </td>

                        <td>
                            <span>Main Item Category</span>
                            <input type="text" name="micat" required>
                        </td>

                        
                    </tr>

                    <tr>
                        <td>
                            <span>Feature Name</span>
                            <input type="text" name="fnm[]" placeholder="Enter feature name" required>
                        </td>

                    
                        <td>
                            <span>Feature Properties</span>
                            <textarea name="fpr[]" placeholder="Divide the feature properties by using underscore" required></textarea>
                        </td>
                    </tr>

                </table>

                <input type="button" id="bcl" value="Add More Fields">
            </div>
          
       
            <div class="con-btn-div">
                <button class="con-btn">CREATE</button>
            </div>
    
   
        </div>
    </form>
  
   

</section>

    <!-- <script src="../../js/loc_form.js"></script> -->
</body>
</html>