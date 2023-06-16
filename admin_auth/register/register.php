<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/sales_login.css" media="all">
    <link rel="stylesheet" href="../../css/sales_login_rep.css" media="all">
    <title>SIGN UP</title>
</head>
<body>
    <div class="form-sec">

    
            
            <h1>REGISTER</h1>
    
            
        <?php
            if (isset($_GET['msg'])) {
                echo "<div class='msg-log'>$_GET[msg]</div>";
            }
        ?>
            <form name="reg-form" action="backend_reg.php" method="post">
            
            <table>
            
                <tr>
                    <td>USERNAME:</td>  <td><input type="text"  name="full" required></td>
                </tr>
    
                
                <tr>
                    <td>EMAIL ADDRESS:</td>   <td><input type="text"  name="email" required></td>
                </tr>
    
                <tr>
                    <td>PASSWORD:</td>
    
                    <td>
                    <span>
                        <input type="password"  name="pass" id="p-p-p"  required>
                    </span>
                    
                    <span id="p-a-t">
                        <input type="checkbox" >VIEW PASSWORD
                    </span>

                    </td>
                    <script src="../../js/jquery.js"></script>
                    <script src="../../js/reed.js"></script>
                </tr>
    
                <tr>
                    <td>PHONE NUMBER:</td>     <td><input type="text"  name="pno" required></td>
                </tr>
    
            </table>
    
            <div class="btn-div">
                <button class="btn">REGISTER</button>
            </div>
            
            </form>
        
        </div>

        <script src="../../js/loc_form.js"></script>
</body>
</html>