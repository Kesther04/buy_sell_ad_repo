
<?php
    //class for updating data in database
    class UPD
    {
        public function up_itm_img($img) {
            require("d_con/database_connection.php");
            
            $update = $con->query(" UPDATE  item_table SET img='$img'  ORDER BY(id)DESC LIMIT 1 ");
    
            return $update;
            
        }   

        public function upd_item_tb($price,$desc,$id){
            require("d_con/database_connection.php");
    
            $update = $con->query("UPDATE item_table SET price='$price',des='$desc' WHERE id ='$id' ");
    
            return $update;
        }

        public function upd_sel_img_tb($img,$id){
            require("d_con/database_connection.php");
    
            $update = $con->query("UPDATE seller_reg_tb SET img='$img' WHERE id ='$id' ");
    
            return $update;
        }

        public function upd_sel_img_cat_tb($gic_img,$imcat){
            require("d_con/database_connection.php");
    
            $update = $con->query("UPDATE category_table SET gic_img='$gic_img' WHERE  group_in_cat = '$imcat'");
    
            return $update;
        }

        public function upd_sel_img_cat_main_tb($ic_img,$icat){
            require("d_con/database_connection.php");
    
            $update = $con->query("UPDATE category_table SET ic_img='$ic_img' WHERE  item_cat = '$icat'");
    
            return $update;
        }

        
        public function upd_feat_tb($fp,$fn,$id){
            require("d_con/database_connection.php");
    
            $update = $con->query("UPDATE feature_table SET feature_prop = '$fp' WHERE feature_name = '$fn' AND item_id = '$id' ");
    
            return $update;
        }

            
        public function upd_user_tb($email,$pass,$pno,$des,$id){
            require("d_con/database_connection.php");

            $update = $con->query("UPDATE seller_reg_tb SET email='$email',password='$pass',pnumber = '$pno',des = '$des' WHERE  id = '$id'  ");

            return $update;
        }


         
        public function upd_user_state_tb($email,$pass,$pno,$state,$lga,$des,$id){
            require("d_con/database_connection.php");

            $update = $con->query("UPDATE seller_reg_tb SET email='$email',password='$pass',pnumber = '$pno',state_of_origin='$state',lga='$lga',des='$des' WHERE  id = '$id'  ");

            return $update;
        }

        

        
        public function upd_cat_tb_all($fpr,$icat,$imcat,$fnm){
            require("d_con/database_connection.php");
    
            $update = $con->query(" UPDATE category_table SET feature_prop='$fpr' WHERE item_cat = '$icat' AND group_in_cat = '$imcat' AND feature_name = '$fnm' ");
    
            return $update;
        }

        public function upd_fd_tb($rep,$cid){
            require("d_con/database_connection.php");
    
            $update = $con->query("UPDATE feedback_table SET reply = '$rep' WHERE id ='$cid' ");
    
            return $update;
        }

        public function upd_lk_tb($likes,$cid){
            require("d_con/database_connection.php");
    
            $update = $con->query("UPDATE feedback_table SET likes = '$likes' WHERE id ='$cid' ");
    
            return $update;
        }

        public function upd_rep_lk_tb($likes,$rid){
            require("d_con/database_connection.php");
    
            $update = $con->query("UPDATE reply_table SET likes = '$likes' WHERE id ='$rid' ");
    
            return $update;
        }
    }

?>