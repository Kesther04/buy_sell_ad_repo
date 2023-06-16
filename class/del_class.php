
<?php
    //class for deleting data in database
   
    class  DEL
    {
        public function del_img($id,$time){
            require("d_con/database_connection.php");

            $delete = $con->query("DELETE FROM img_table WHERE item_id = '$id' AND time = '$time' ");
            
            return $delete;
        }       
        
        public function del_item($id){
            require("d_con/database_connection.php");
    
            $del = $con->query("DELETE FROM item_table WHERE id = '$id'");
    
            return $del;
        }    

        public function del_item_img($id){
            require("d_con/database_connection.php");
    
            $del = $con->query("DELETE FROM img_table WHERE item_id = '$id'");
    
            return $del;
        }    
    

        public function del_item_feat($id){
            require("d_con/database_connection.php");
    
            $del = $con->query("DELETE FROM feature_table WHERE item_id = '$id'");
    
            return $del;
        }    

        public function del_like($cid,$sid){
            require("d_con/database_connection.php");
    
            $del = $con->query("DELETE FROM likes_table WHERE com_id = '$cid' AND sel_id = '$sid' ");
    
            return $del;
        }    

        public function del_rep_like($rid,$sid){
            require("d_con/database_connection.php");
    
            $del = $con->query("DELETE FROM rep_likes_table WHERE rep_id = '$rid' AND sel_id = '$sid' ");
    
            return $del;
        }    

        public function del_save($id,$sid){
            require("d_con/database_connection.php");
    
            $del = $con->query("DELETE FROM saved_table WHERE item_id = '$id' AND sel_id = '$sid' ");
    
            return $del;
        }    
    }
    
?>