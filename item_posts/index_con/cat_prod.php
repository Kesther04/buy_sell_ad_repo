
<?php require('../../session.php'); ?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' href='../../css/style.css' media='all'>
    <link rel='stylesheet' href='../../css/resp_style.css' media='all'>
    <title>Profile</title>
</head>
<body id='total-div'>
    
    

    
    <?php require('../header.php'); ?>
    

    <section class="profile-page">
        <!-- the section contains info about the seller and adverts of the seller -->
        
        <div class="fst-mcpc">
            <?php require('inner_profile.php'); ?>
        </div>

        <div class="snd-pp">
            <div class="inner-snd-mcpc">
                <?php require('inner_com.php'); ?>
            </div>
        </div>
    </section>


    <section class='last-container'>
        <!-- container for the footer of the page -->
        <?php require('../footer.php'); ?>
    </section>



    <script src='../../js/jquery.js'></script>
    <script src='../../js/dash.js'></script>
    <script src='../../js/ajax.js'></script>
    <script src='../../js/item_rev.js'></script>
    <script src='../../js/abt_sel.js'></script>
</body>
</html>
