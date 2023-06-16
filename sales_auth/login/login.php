<?php 
    session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/sales_login.css" media="all">
    <link rel="stylesheet" href="../../css/sales_login_rep.css" media="all">
    <title>LOGIN</title>
</head>
<body>
    
    <div class="login-sec">
    
    <h1>LOGIN</h1>
    
    <form name="login-form" action="backend_login.php" method="post">

    <?php
        if (isset($_GET['msg'])) {
            echo "<div class='msg-log'>$_GET[msg]</div>";
        }
    ?>

    <table>
    
        <tr>
            <td><span>EMAIL ADDRESS:</span>
            <input type="text" name="email" placeholder="ENTER YOUR EMAIL ADDRESS"></td>
        </tr>
        
        <tr>
            <td><span>PASSWORD:</span>
            <input type="password" name="pass" placeholder="ENTER YOUR PASSWORD" class="p-pass"></td>
        </tr>

        <tr>            
            <td id="tock">
                <input type="checkbox" >VIEW PASSWORD
            </td>
        </tr>

        <script src="../../js/jquery.js"></script>
        <script src="../../js/reg.js"></script>

        <tr>
            <td>
                <i><a href="../register/register.php" title="Create an Account as a vendor">CREATE ACCOUNT</a></i>
            </td>
        </tr>

    </table>

    

    <div class="btn-div">
        <button class="btn">ENTER</button>
    </div>
    
    </form>

       
    </div>
</body>
</html>