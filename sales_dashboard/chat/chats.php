
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "../../css/sdash.css" media ="all">
    <link rel="stylesheet" href="../../css/sdash_rep.css" media="all">
    <script src="../../js/jquery.js"></script>
    <script src="../../js/rev.js"></script>
    <script src="../../js/ajax.js"></script>
    
    <title>USER MESSAGES</title>
</head>
<body id="total-div">
    
    <?php require("../sales_dashboard_layout.php"); ?>

    <section class='main-div-container' >

        <div class="sec-div-container sp-und">
            <?php

                $rid = $_GET['id'];
                $rname = str_ireplace('-',' ',$_GET['name']);
                
                require("../../class/sel_class.php");
                $sel_ob = new SEL();
            
                    echo "<h1 style='text-transform:uppercase;'>$rname</h1>";

                

                    $sel_con = $sel_ob->sel_u_msg();
                    if($sel_con){
                    
                    

                        while ($row=$sel_con->fetch_assoc()) {
                            if (strstr($row['message']," *$* ")) {
                                $msg = str_replace(" *$* ","'",$row['message']);
                            }else {
                                $msg = $row['message'];
                            }

                            $date = $row['date'];
                            $time = $row['time'];
                
                            if ($row['username']==$_SESSION['name'] AND $row['user_id']==$_SESSION['id'] AND $row['rep_name']==$rname) {
                                echo "
                                <div class='selo'>
                                    $msg
                                    <div class='inner-sles'>
                                        $time
                                    </div>

                                </div>";
                            }
                            elseif ($row['username']==$rname AND $row['user_id']==$rid AND $row['rep_name']==$_SESSION['name']) {
                                echo "
                                <div class='leso'>
                                    $msg
                                    <div class='inner-sles'>
                                        $time
                                    </div>
                                </div>";
                            }
                            
                
                        }
                        
                    }


                
            ?>

        </div>
        
        <div id="u-form">
        
            <form class="chat-frm" method="post" action="backend_chats.php">
                <div class="u-form">
                    <div class="fst-inner-u-form">
                        <input type="text" name="msg" placeholder="SEND MESSAGE" required>
                        <input type="hidden" name="id" value="<?php echo $_SESSION['id'] ?>" required readonly>
                        <input type="hidden" name="uname" value="<?php echo $_SESSION['name'] ?>" required readonly>
                        <input type="hidden" name="email" value="<?php echo $_SESSION['email'] ?>" required readonly>
                        <input type="hidden" name="rid" value="<?php echo $_GET['id'];  ?>"  required readonly>
                        <input type="hidden" name="rname" value="<?php echo $rname;  ?>"  required readonly>
                    </div>
                    <div class="snd-inner-u-form">
                        <button class="con-btn" >SEND</button>
                    </div>
                </div>
            </form>
            
        </div>

    </section>


    
</body>
</html>