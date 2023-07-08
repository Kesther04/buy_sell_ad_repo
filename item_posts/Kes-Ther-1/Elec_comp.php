
<?php require('../../session.php'); ?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' href='../../css/style.css' media='all'>
    <link rel='stylesheet' href='../../css/resp_style.css' media='all'>
    <link rel='stylesheet' href='../../css/bin_cd.css' media='all'>
    <title>Elec_comp</title>
</head>
<body id='total-div'>
    
    
        
            
    <section class='fst-container'>
        <!-- the first section of the page-->
        <?php require('../header.php'); ?>
        
        <div class='prod-name'>Elec_comp</div>

        <div class='fst-container-prod'>
            <div class='img-container-prod'>

                <div class='container-prod'>
                    <!-- Slider main container -->
                    <div class='swiper'>
                        <!-- Additional required wrapper -->
                        
                        <div class='swiper-wrapper'>
                            <!-- Slides -->
                            <?php require('../img_show.php'); ?>
                        </div>

                        <!-- If we need pagination -->
                        <div class='swiper-pagination'></div>

                        <!-- If we need navigation buttons -->
                        <div class='swiper-button-prev'></div>
                        <div class='swiper-button-next'></div>

                    </div>
                </div>

                <!-- the link to the page of the  feature of the commodity provided -->
                <?php require('../feature.php'); ?>
                    
                
            </div>

            <div class='after-img-container-prod'>

                <div class='fst-aicp'>
                    <!-- cost of the item -->
                    <?php require('../price.php'); ?>
                </div>

                <div class='snd-aicp'>
                    <!-- contact,chat system and profile details about the sales person  -->
                    <?php require('../profile.php'); ?>
                    
                </div>

                <div class='thd-aicp'>
                    <!-- feedback link -->
                    <?php require('../feedback/index.php'); ?>
                </div>

                <div class='fth-aicp'>
                    <!-- safety tips for customers/purchasers -->
                    <h3>SAFETY TIPS</h3>
                    <ul>
                        <li>Remember, don't send any pre-payments.</li>
                        <li>Meet the seller at a safe public place.</li>
                        <li>Inspect the goods to make sure they meet your needs.</li>
                        <li>Check all documentation and only pay if you're satisfied.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class='snd-container-prod'>
        <!-- container for other commodities of this category -->
        <div class='inner-snd-contaner-prod'>
            <h1>Similar Ads</h1>
        </div>
        <div class='inner-snd-container-prod'>
            <?php require('../commodity.php');?>
        </div>
        

    </section>

    <section class='last-container'>
        <!-- container for the footer of the page -->
        <?php require('../footer.php'); ?>
    </section>

    

    <script src='../../js/bin_cd.js'></script>
    <script src='../../js/eee.js'></script>
    <script src='../../js/jquery.js'></script>
    <script src='../../js/dash.js'></script>
    <script src='../../js/ajax.js'></script>
</body>
</html>
