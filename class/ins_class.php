
<?php
    //class for inserting data in database
    class INS
    {
        public function ins_sell_reg($img,$full,$gender,$email,$state,$lga,$pass,$pno,$des,$date,$fullDay,$time){
            require("d_con/database_connection.php");

            $ins = $con->query("INSERT INTO seller_reg_tb(img,fullname,gender,email,state_of_origin,lga,password,pnumber,des,date,fullDay,time)VALUE('$img','$full','$gender','$email','$state','$lga','$pass','$pno','$des','$date','$fullDay','$time')");
            
            return $ins;
        }

        public function ins_admin_reg($full,$email,$pass,$pno,$date,$time){
            require("d_con/database_connection.php");

            $ins = $con->query("INSERT INTO admin_tb(fullname,email,password,pnumber,date,time)VALUE('$full','$email','$pass','$pno','$date','$time')");
            
            return $ins;
        }

        public function ins_item($uid,$iname,$group,$group_cat,$img,$loc,$price,$uname,$pno,$des,$date,$fullDay,$time){
            require("d_con/database_connection.php");

            $insert = $con->query("INSERT INTO item_table(sel_id,item_name,item_cat,group_in_cat,img,location,price,sel_name,pnumber,des,date,fullDay,time)VALUE('$uid','$iname','$group','$group_cat','$img','$loc','$price','$uname','$pno','$des','$date','$fullDay','$time')");
            
            return $insert;
        }

        public function ins_img_item($item_id,$img,$size,$type,$date,$time){
            require("d_con/database_connection.php");

            $insert = $con->query("INSERT INTO img_table(item_id,img,size,type,date,time)VALUE('$item_id','$img','$size','$type','$date','$time')");
            
            return $insert;
        }
        
        public function ins_feat($cid,$id,$iname,$fn,$fp,$date,$time){
            require("d_con/database_connection.php");
    
            $insert = $con->query("INSERT INTO feature_table (cat_id,item_id,item_name,feature_name,feature_prop,date,time)VALUE('$cid','$id','$iname','$fn','$fp','$date','$time')");
    
            return $insert;
        }

        public function ins_cat_upl($icat,$gic,$fn,$fp,$date,$time){
            require("d_con/database_connection.php");
    
            $insert = $con->query("INSERT INTO category_table (item_cat,group_in_cat,feature_name,feature_prop,date,time)VALUE('$icat','$gic','$fn','$fp','$date','$time')");
    
            return $insert;
        }
        
        public function ins_view($item_id,$iname,$sess,$uid,$views,$date,$time){
            require("d_con/database_connection.php");
    
            $insert = $con->query("INSERT INTO views_table (item_id,item_name,session,user_id,views,date,time)VALUE('$item_id','$iname','$sess','$uid','$views','$date','$time')");
    
            return $insert;
        }

        
        public function ins_msg($cid,$uid,$uname,$email,$msg,$date,$time,$rid,$rname){
            require("d_con/database_connection.php");
    
            $insert = $con->query("INSERT INTO user_msg (convo_id,user_id,username,email,message,date,time,rep_id,rep_name)VALUE('$cid','$uid','$uname','$email','$msg','$date','$time','$rid','$rname')");
    
            return $insert;
        }

        public function ins_feed($sid,$uid,$sname,$uname,$email,$feed,$likes,$rep,$date,$time){
            require("d_con/database_connection.php");
    
            $insert = $con->query("INSERT INTO feedback_table (sel_id,user_id,sel_name,username,email,feed_back,likes,reply,date,time)VALUE('$sid','$uid','$sname','$uname','$email','$feed','$likes','$rep','$date','$time')");
    
            return $insert;
        }

        public function ins_reply($cid,$sid,$sname,$rep,$likes,$rr,$date,$time){
            require("d_con/database_connection.php");
    
            $insert = $con->query("INSERT INTO reply_table (com_id,sel_id,sel_name,reply,likes,reply_rep,date,time)VALUE('$cid','$sid','$sname','$rep','$likes','$rr','$date','$time')");
    
            return $insert;
        }

        public function ins_like($cid,$sid,$sname,$likes,$date,$time){
            require("d_con/database_connection.php");
    
            $insert = $con->query("INSERT INTO likes_table (com_id,sel_id,sel_name,likes,date,time)VALUE('$cid','$sid','$sname','$likes','$date','$time')");
    
            return $insert;
        }

        public function ins_rep_like($rid,$sid,$sname,$likes,$date,$time){
            require("d_con/database_connection.php");
    
            $insert = $con->query("INSERT INTO rep_likes_table (rep_id,sel_id,sel_name,likes,date,time)VALUE('$rid','$sid','$sname','$likes','$date','$time')");
    
            return $insert;
        }

        public function ins_save($sid,$id,$sname,$date,$time){
            require("d_con/database_connection.php");
    
            $insert = $con->query("INSERT INTO saved_table (sel_id,item_id,sel_name,date,time)VALUE('$sid','$id','$sname','$date','$time')");
    
            return $insert;
        }
    }

?>