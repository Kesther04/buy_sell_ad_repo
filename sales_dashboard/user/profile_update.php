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
    <script src="../../js/snd_dash.js"></script>
    <title>DASHBOARD</title>
</head>
<body>
        
    <?php require("../sales_dashboard_layout.php"); ?>

   
    <div id="masag">
        <div class="msg">    
            <div class="msa"></div>
            <a href="../../sales_auth/login/login.php" title="return to the login page"><button class="aj-btn">COMPLETE</button></a>
        </div>
    </div>
    
    <section class="main-div-container">
        <div class="sec-div-container">
            <form class="prof-upd" action="backend_profile_update.php" method="post">
            
                <div class="fir-div-container">

                    <h1>UPDATE PROFILE INFO</h1>

                        <input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>" required readonly>
                        
                        <table>

                            <tr>
                                <td>
                                    <span>Update State Of Origin</span>
                                    <select name="state" id="state" onchange="show(ele)" ></select>
                                </td>
                            
                                <td id="slga1" style="display:none;">
                                    <span>Update LGA</span>
                                    <select name="lga" id="slga"></select>
                                </td>
                                                        
                            </tr>

                            <tr>
                                
                                <td title="change Email Address if necessary">
                                    <span>Update Email Address</span>   
                                    <input type="text"  name="email" value="<?php echo $_SESSION['email']; ?>" required>
                                </td>
                            
                                
                                <td title="change phone number if necessary">
                                    <span>Update Phone Number</span>     
                                    <input type="number"  name="pno" value="<?php echo $_SESSION['pno']; ?>" required>
                                </td>

                            
                            </tr>

                            <tr>
                                
                                <td>
                                    <span>Current Password</span>
                                    <input type="password"  name="cpass" id="p-p-p">
                                </td>

                                
                                <td>
                                    <span>New Password</span>
                                    <input type="password"  name="npass"  id="g-g-g">
                                </td>
                                
                            </tr>

                            <tr>
                                <td id="p-a-t">
                                    <span><input type="checkbox">VIEW PASSWORD</span>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <span>Add About User</span>
                                    <?php if ($_SESSION['des'] == '0') { ?>
                                        <input type="text" name="des">
                                    <?php }else{ ?>
                                        <input type="text" name="des" value="<?php echo $_SESSION['des']; ?>">
                                    <?php } ?>
                                </td>
                            </tr>

                        </table>

                    <div class="con-btn-div">
                        <button class="con-btn">UPDATE</button>
                    </div>
                    
                    
                </div>
                
            </form>
        </div>
    </section>
    
    <script src="../../js/reed.js"></script>
    <script src="../../js/loc_form.js"></script>
</body>
</html>
