
<?php
    //class for selecting data in database
    class SEL
    {
        public function sel_log($email,$pass) {
            require("d_con/database_connection.php");
            
            $sel = $con->query(" SELECT * FROM seller_reg_tb WHERE email = '$email' AND password = '$pass' ");
    
            return $sel;
            
        }   

        public function sel_log_admin($email,$pass) {
            require("d_con/database_connection.php");
            
            $sel = $con->query(" SELECT * FROM admin_tb WHERE email = '$email' AND password = '$pass' ");
    
            return $sel;
            
        }   

        public function sel_id_pro($id) {
            require("d_con/database_connection.php");
            
            $sel = $con->query(" SELECT * FROM seller_reg_tb WHERE id = '$id' ");
    
            return $sel;
            
        }   

           
    
        public function sel_nt($uid,$nt,$group){
            require("d_con/database_connection.php");
    
            $select = $con->query(" SELECT * FROM item_table WHERE sel_id = '$uid' AND item_name = '$nt' AND group_in_cat = '$group' ");
    
            return $select;
        }

        
        public function sel_img_id($id){
            require("d_con/database_connection.php");
    
            $select = $con->query(" SELECT * FROM img_table WHERE item_id = '$id' ");
    
            return $select;
        }

        public function sel_saved($sid){
            require("d_con/database_connection.php");
    
            $select = $con->query(" SELECT * FROM saved_table WHERE  sel_id = '$sid' ");
    
            return $select;
        }

        public function sel_save_id($id,$sid){
            require("d_con/database_connection.php");
    
            $select = $con->query(" SELECT * FROM saved_table WHERE item_id = '$id' AND sel_id = '$sid' ");
    
            return $select;
        }

       

        
        public function sel_item_tb($name,$id){
            require("d_con/database_connection.php");
    
            $select = $con->query(" SELECT * FROM item_table WHERE item_name = '$name' AND sel_id = '$id' ");
    
            return $select;
        }

        public function sel_del($uid){
            require("d_con/database_connection.php");
    
            $select = $con->query(" SELECT * FROM item_table  WHERE sel_id = '$uid' ORDER BY(id)DESC LIMIT 1 ");
    
            return $select;
        }

        public function sel_nselup_gp($uid){
            require("d_con/database_connection.php");
    
            $select = $con->query(" SELECT * FROM item_table WHERE sel_id = '$uid' GROUP BY(item_cat)ASC");
    
            return $select;
        }

        public function sel_nameidgp($id,$group){
            require("d_con/database_connection.php");
    
            $select = $con->query(" SELECT * FROM item_table WHERE sel_id = '$id' AND item_cat='$group' GROUP BY(group_in_cat)ASC ");
    
            return $select;
        }

        public function sel_namegp($group){
            require("d_con/database_connection.php");
    
            $select = $con->query(" SELECT * FROM item_table WHERE item_cat='$group' GROUP BY(group_in_cat)ASC ");
    
            return $select;
        }

        public function sel_namenogp($group){
            require("d_con/database_connection.php");
    
            $select = $con->query(" SELECT * FROM item_table WHERE item_cat='$group'  ");
    
            return $select;
        }

        public function sel_catnamegp($group){
            require("d_con/database_connection.php");
    
            $select = $con->query(" SELECT * FROM item_table WHERE group_in_cat='$group'  ");
    
            return $select;
        }

        public function sel_catnameidgp($id,$group){
            require("d_con/database_connection.php");
    
            $select = $con->query(" SELECT * FROM item_table WHERE sel_id = '$id' AND group_in_cat='$group'  ");
    
            return $select;
        }

        
        public function sel_catnamegpou($id,$group){
            require("d_con/database_connection.php");
    
            $select = $con->query(" SELECT * FROM item_table WHERE id='$id' AND group_in_cat='$group'  ");
    
            return $select;
        }

        public function sel_id_catnamegpou($id,$group,$sid){
            require("d_con/database_connection.php");
    
            $select = $con->query(" SELECT * FROM item_table WHERE id='$id' AND group_in_cat='$group' AND sel_id='$sid' ");
    
            return $select;
        }

        
        public function sel_catnamenogp($group){
            require("d_con/database_connection.php");
    
            $select = $con->query(" SELECT * FROM item_table WHERE group_in_cat='$group' GROUP BY(group_in_cat)ASC ");
    
            return $select;
        }
        
        
        public function sel_item_id($pid){
            require("d_con/database_connection.php");

            $select = $con->query(" SELECT * FROM item_table WHERE  id='$pid' ");

            return $select;
        }

        public function sel_feat_id($id){
            require("d_con/database_connection.php");

            $select = $con->query(" SELECT * FROM feature_table WHERE  item_id='$id' ");

            return $select;
        }

        public function sel_feat_csid($id,$fnm){
            require("d_con/database_connection.php");

            $select = $con->query(" SELECT * FROM feature_table WHERE  item_id='$id' AND feature_name = '$fnm' ");

            return $select;
        }

        
        public function sel_feat_cat($cid,$fnm,$fp){
            require("d_con/database_connection.php");

            $select = $con->query(" SELECT * FROM feature_table WHERE cat_id = '$cid' AND feature_name = '$fnm' AND feature_prop = '$fp'  ");

            return $select;
        }




        public function sel_all_item($id){
            require("d_con/database_connection.php");
    
            $select = $con->query(" SELECT * FROM item_table WHERE sel_id='$id' ORDER BY(id)DESC  ");
    
            return $select;
        }

        public function sel_allgrp_item($id){
            require("d_con/database_connection.php");
    
            $select = $con->query(" SELECT * FROM item_table WHERE sel_id='$id' GROUP BY group_in_cat ASC ORDER BY(id)DESC  ");
    
            return $select;
        }

        public function sel_all_item_grp($group){
            require("d_con/database_connection.php");
    
            $select = $con->query(" SELECT * FROM item_table WHERE group_in_cat='$group' ORDER BY(id)DESC  ");
    
            return $select;
        }

        
        public function sel_all_items(){
            require("d_con/database_connection.php");
    
            $select = $con->query(" SELECT * FROM item_table  ORDER BY(id)DESC  ");
    
            return $select;
        }

        public function sel_all_grpitem(){
            require("d_con/database_connection.php");
    
            $select = $con->query(" SELECT * FROM item_table GROUP BY(item_cat)ASC ORDER BY(id)DESC  ");
    
            return $select;
        }


        
        public function sel_amt_sort($lam,$ham,$group){
            require("d_con/database_connection.php");
    
            $select = $con->query(" SELECT * FROM item_table WHERE price BETWEEN $lam AND $ham AND  item_cat='$group'  ");
    
            return $select;
        }

        
        
        public function sel_amt_large($ham,$group){
            require("d_con/database_connection.php");
    
            $select = $con->query(" SELECT * FROM item_table WHERE price >= $ham AND  item_cat='$group'  ");
    
            return $select;
        }

        
        
        public function sel_amt_sort_main($lam,$ham,$group){
            require("d_con/database_connection.php");
    
            $select = $con->query(" SELECT * FROM item_table WHERE price BETWEEN $lam AND $ham AND  group_in_cat='$group'  ");
    
            return $select;
        }

        
        
        public function sel_amt_large_main($ham,$group){
            require("d_con/database_connection.php");
    
            $select = $con->query(" SELECT * FROM item_table WHERE price >= $ham AND  group_in_cat='$group'  ");
    
            return $select;
        }

        public function sel_amt_sort_main_id($lam,$ham,$group,$id){
            require("d_con/database_connection.php");
    
            $select = $con->query(" SELECT * FROM item_table WHERE price BETWEEN $lam AND $ham AND  group_in_cat='$group' AND sel_id='$id' ");
    
            return $select;
        }

        
        
        public function sel_amt_large_main_id($ham,$group,$id){
            require("d_con/database_connection.php");
    
            $select = $con->query(" SELECT * FROM item_table WHERE price >= $ham AND  group_in_cat='$group' AND sel_id='$id'  ");
    
            return $select;
        }



        public function sel_cat_tb(){
            require("d_con/database_connection.php");
    
            $select = $con->query(" SELECT * FROM category_table ");
    
            return $select;
        }

        public function sel_all_grpcat(){
            require("d_con/database_connection.php");
    
            $select = $con->query(" SELECT * FROM category_table GROUP BY(item_cat)ASC  ");
    
            return $select;
        }

        public function cat_tb_grpcat($icat){
            require("d_con/database_connection.php");
    
            $select = $con->query(" SELECT * FROM category_table WHERE item_cat = '$icat' GROUP BY(group_in_cat)ASC  ");
    
            return $select;
        }

        public function cat_tb_all($icat,$imcat){
            require("d_con/database_connection.php");
    
            $select = $con->query(" SELECT * FROM category_table WHERE item_cat = '$icat' AND group_in_cat = '$imcat'  ");
    
            return $select;
        }

        public function cat_tb_all_id($id){
            require("d_con/database_connection.php");
    
            $select = $con->query(" SELECT * FROM category_table WHERE  id = '$id' ");
    
            return $select;
        }

        public function cat_tbin_cat($imcat){
            require("d_con/database_connection.php");
    
            $select = $con->query(" SELECT * FROM category_table WHERE  group_in_cat = '$imcat'  ");
    
            return $select;
        }
        
        // public function sel_save_itm($id){
        //     require("d_con/database_connection.php");
    
        //     $select = $con->query(" SELECT * FROM saved_table WHERE item_id = '$id' ");
    
        //     return $select;
        // }

        public function sel_vw_tb($id){
            require("d_con/database_connection.php");
    
            $select = $con->query(" SELECT * FROM views_table WHERE item_id = '$id'  ");
    
            return $select;
        }



        
        public function sel_view_sess_tb($id,$uid){
            require("d_con/database_connection.php");
    
            $select = $con->query(" SELECT * FROM views_table WHERE item_id = '$id' AND  user_id = '$uid' ");
    
            return $select;
        }

        public function sel_u_msg(){
            require("d_con/database_connection.php");
    
            $select = $con->query(" SELECT * FROM user_msg ");
    
            return $select;
        }

        public function sel_su_msg(){
            require("d_con/database_connection.php");
    
            $select = $con->query(" SELECT * FROM user_msg  NATURAL JOIN(SELECT MAX(id) as id FROM user_msg GROUP BY convo_id ) sub  ");
    
            return $select;
        }




        public function sel_feed($id,$name){
            require("d_con/database_connection.php");
    
            $select = $con->query(" SELECT * FROM feedback_table WHERE sel_id = '$id' AND sel_name = '$name' ORDER BY id DESC ");
    
            return $select;
        }

        public function sel_feed_id($id){
            require("d_con/database_connection.php");
    
            $select = $con->query(" SELECT * FROM feedback_table WHERE id = '$id'  ORDER BY id DESC ");
    
            return $select;
        }

        public function sel_reply($id){
            require("d_con/database_connection.php");
    
            $select = $con->query(" SELECT * FROM reply_table WHERE com_id = '$id'  ORDER BY id DESC ");
    
            return $select;
        }

        public function sel_dub_reply($id,$rr){
            require("d_con/database_connection.php");
    
            $select = $con->query(" SELECT * FROM reply_table WHERE com_id = '$id' AND reply_rep = '$rr'   ");
    
            return $select;
        }

        public function sel_reply_rep($id){
            require("d_con/database_connection.php");
    
            $select = $con->query(" SELECT * FROM reply_table WHERE reply_rep = '$id'  ORDER BY id DESC ");
    
            return $select;
        }

        

        public function sel_dub_replyly($id,$rr){
            require("d_con/database_connection.php");
    
            $select = $con->query(" SELECT * FROM reply_table WHERE com_id = '$id' AND reply_rep = '$rr' ORDER BY id DESC  LIMIT 5  ");
    
            return $select;
        }


        public function sel_like($id){
            require("d_con/database_connection.php");
    
            $select = $con->query(" SELECT * FROM likes_table WHERE com_id = '$id'  ORDER BY id DESC ");
    
            return $select;
        }

        public function sel_rep_like($id){
            require("d_con/database_connection.php");
    
            $select = $con->query(" SELECT * FROM rep_likes_table WHERE rep_id = '$id'  ORDER BY id DESC ");
    
            return $select;
        }
     
        public function sel_pt_like($id,$sid){
            require("d_con/database_connection.php");
    
            $select = $con->query(" SELECT * FROM likes_table WHERE com_id = '$id' AND sel_id = '$sid' ");
    
            return $select;
        }

        public function sel_pt_rep_like($id,$sid){
            require("d_con/database_connection.php");
    
            $select = $con->query(" SELECT * FROM rep_likes_table WHERE rep_id = '$id' AND sel_id = '$sid' ");
    
            return $select;
        }
     

    }


?>