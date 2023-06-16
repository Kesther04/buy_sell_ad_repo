$(document).ready(function () {
    

    $(".itm_upl").submit(function(e){
        e.preventDefault();
        $.ajax({
            url:'backend_item_upload.php',
            type:'post',
            data:new FormData(this),
            cache:false,
            contentType:false,
            processData:false,
            success: function(dat) {
                $("#masag").css({'visibility':'visible'});
                $(".msa").html(dat);            

            }
        
        });     
    });

    
    $(".cat_upl").submit(function(e){
        e.preventDefault();
        $.ajax({
            url:'backend_cat_upload.php',
            type:'post',
            data:new FormData(this),
            cache:false,
            contentType:false,
            processData:false,
            success: function(dat) {
                $("#masag").css({'visibility':'visible'});
                $(".msa").html(dat);            

            }
        
        });     
    });

    $(".full_itm_upl").submit(function(e){
        e.preventDefault();
        $.ajax({
            url:'full_item_upload.php',
            type:'post',
            data:new FormData(this),
            cache:false,
            contentType:false,
            processData:false,
            success: function(dat) {
                $(".seco-div-container").html(dat);            

            }
            
        });    
    });

    


    $(".del-itm").submit(function(e){
        e.preventDefault();
        $.ajax({
            url:'item_del_upload.php',
            type:'post',
            data:new FormData(this),
            cache:false,
            contentType:false,
            processData:false,
            success: function(dat) {
                $(".seco-div-container").html(dat);            

            }
            
        });    
    });
    
    $(".upd-itm").submit(function(e){
        e.preventDefault();
        $.ajax({
            url:'item_uploaded.php',
            type:'post',
            data:new FormData(this),
            cache:false,
            contentType:false,
            processData:false,
            success: function(dat) {
                $(".seco-div-container").html(dat);            

            }
            
        });    
    });


    $(".itm_upld").submit(function(e){
        e.preventDefault();
        $.ajax({
            url:'backend_item_update.php',
            type:'post',
            data:new FormData(this),
            cache:false,
            contentType:false,
            processData:false,
            success: function(dat) {
                $("#masag").css({'visibility':'visible'});
                $(".msa").html(dat);              

            }
            
        });    
    });

    $(".itm_deld").submit(function(e){
        e.preventDefault();
        $.ajax({
            url:'backend_item_delete.php',
            type:'post',
            data:new FormData(this),
            cache:false,
            contentType:false,
            processData:false,
            success: function(dat) {
                $("#masag").css({'visibility':'visible'});
                $(".msa").html(dat);              

            }
            
        });    
    });


    $(".dis-feat").change(function(e){
        e.preventDefault();
        $.ajax({
            url:'../../commodity_feat.php',
            type:'post',
            data:new FormData(this),
            cache:false,
            contentType:false,
            processData:false,
            success: function(dat) {
                $(".inner-snd-mcpc").html(dat);

            }
            
        });    
    });

    $(".dis-feat").change(function(e){
        e.preventDefault();
        $.ajax({
            url:'commodity_feat.php',
            type:'post',
            data:new FormData(this),
            cache:false,
            contentType:false,
            processData:false,
            success: function(dat) {
                $(".inner-snd-mcpc").html(dat);

            }
            
        });    
    });

    
    $(".prof-upd").submit(function(e){
        e.preventDefault();
        $.ajax({
            url:'backend_profile_update.php',
            type:'post',
            data:new FormData(this),
            cache:false,
            contentType:false,
            processData:false,
            success: function(dat) {
                $("#masag").css({'visibility':'visible'});
                $(".msa").html(dat);              

            }
            
        });    
    });


    
    $(".ful_cat_upd").submit(function(e){
        e.preventDefault();
        $.ajax({
            url:'full_cat_update.php',
            type:'post',
            data:new FormData(this),
            cache:false,
            contentType:false,
            processData:false,
            success: function(dat) {
                $(".seco-div-container").html(dat);  

            }
            
        });    
    });


    
    $(".cat_upd").submit(function(e){
        e.preventDefault();
        $.ajax({
            url:'backend_cat_update.php',
            type:'post',
            data:new FormData(this),
            cache:false,
            contentType:false,
            processData:false,
            success: function(dat) {
                $("#masag").css({'visibility':'visible'});
                $(".msa").html(dat);        
            }
            
        });    
    });


    
    
    $(".chat-frm").submit(function(e){
        e.preventDefault();
        $.ajax({
            url:'backend_chats.php',
            type:'post',
            data:new FormData(this),
            cache:false,
            contentType:false,
            processData:false,
            success: function(dat) {
                $("#total-div").load("#total-div");
            }
            
        });    
    });

        
    $(".comfm").submit(function(e){
        e.preventDefault();
        $.ajax({
            url:'backend_feedback.php',
            type:'post',
            data:new FormData(this),
            cache:false,
            contentType:false,
            processData:false,
            success: function(dat) {
                $("#total-div").load("#total-div");
            }
            
        });    
    });

    $(".repfm").submit(function(e){
        e.preventDefault();
        $.ajax({
            url:'backend_reply.php',
            type:'post',
            data:new FormData(this),
            cache:false,
            contentType:false,
            processData:false,
            success: function(dat) {
                $("#total-div").load("#total-div");
            }
            
        });    
    });

    $(".rep-repfm").submit(function(e){
        e.preventDefault();
        $.ajax({
            url:'backend_reply_rep.php',
            type:'post',
            data:new FormData(this),
            cache:false,
            contentType:false,
            processData:false,
            success: function(dat) {
                $("#total-div").load("#total-div");
            }
            
        });    
    });

    $(".rep-btn-frm").submit(function(e){
        e.preventDefault();
        $.ajax({
            url:'reply.php',
            type:'post',
            data:new FormData(this),
            cache:false,
            contentType:false,
            processData:false,
            success: function(dat) {
                $("#masag").css({'visibility':'visible'});
                $(".msa").slideDown(1000).html(dat);            
                $(".aj-btn").click(function(){
                    $("#masag").css({'visibility':'hidden'});
                    $("#total-div").load("#total-div");
                })
            }
            
        });    
    });

    $(".rep-rep-btn-frm").submit(function(e){
        e.preventDefault();
        $.ajax({
            url:'reply_rep.php',
            type:'post',
            data:new FormData(this),
            cache:false,
            contentType:false,
            processData:false,
            success: function(dat) {
                $("#masag").css({'visibility':'visible'});
                $(".msa").slideDown(1000).html(dat);            
                $(".aj-btn").click(function(){
                    $("#masag").css({'visibility':'hidden'});
                    $("#total-div").load("#total-div");
                })
            }
            
        });    
    });

    $(".add-like-btn").submit(function(e){
        e.preventDefault();
        $.ajax({
            url:'like/addlike.php',
            type:'post',
            data:new FormData(this),
            cache:false,
            contentType:false,
            processData:false,
            success: function(dat) {
                $("#total-div").load("#total-div");
            }
            
        });    
    });

    $(".del-like-btn").submit(function(e){
        e.preventDefault();
        $.ajax({
            url:'like/dellike.php',
            type:'post',
            data:new FormData(this),
            cache:false,
            contentType:false,
            processData:false,
            success: function(dat) {
                $("#total-div").load("#total-div");
            }
            
        });    
    });

    $(".add-rep-like-btn").submit(function(e){
        e.preventDefault();
        $.ajax({
            url:'rep_like/addlike.php',
            type:'post',
            data:new FormData(this),
            cache:false,
            contentType:false,
            processData:false,
            success: function(dat) {
                $("#total-div").load("#total-div");
            }
            
        });    
    });

    $(".del-rep-like-btn").submit(function(e){
        e.preventDefault();
        $.ajax({
            url:'rep_like/dellike.php',
            type:'post',
            data:new FormData(this),
            cache:false,
            contentType:false,
            processData:false,
            success: function(dat) {
                $("#total-div").load("#total-div");
            }
            
        });    
    });

    $(".sinp").submit(function(e){
        e.preventDefault();
        $.ajax({
            url:'saved/input_saved.php',
            type:'post',
            data:new FormData(this),
            cache:false,
            contentType:false,
            processData:false,
            success: function(dat) {
                $("#total-div").load("#total-div");
            }
            
        });    
    });

    $(".sdel").submit(function(e){
        e.preventDefault();
        $.ajax({
            url:'saved/del_saved.php',
            type:'post',
            data:new FormData(this),
            cache:false,
            contentType:false,
            processData:false,
            success: function(dat) {
                $("#total-div").load("#total-div");
            }
            
        });    
    });

    $(".sinp").submit(function(e){
        e.preventDefault();
        $.ajax({
            url:'../../saved/input_saved.php',
            type:'post',
            data:new FormData(this),
            cache:false,
            contentType:false,
            processData:false,
            success: function(dat) {
                $("#total-div").load("#total-div");
            }
            
        });    
    });

    $(".sdel").submit(function(e){
        e.preventDefault();
        $.ajax({
            url:'../../saved/del_saved.php',
            type:'post',
            data:new FormData(this),
            cache:false,
            contentType:false,
            processData:false,
            success: function(dat) {
                $("#total-div").load("#total-div");
            }
            
        });    
    });

    $(".sinp").submit(function(e){
        e.preventDefault();
        $.ajax({
            url:'../../../saved/input_saved.php',
            type:'post',
            data:new FormData(this),
            cache:false,
            contentType:false,
            processData:false,
            success: function(dat) {
                $("#total-div").load("#total-div");
            }
            
        });    
    });

    $(".sdel").submit(function(e){
        e.preventDefault();
        $.ajax({
            url:'../../../saved/del_saved.php',
            type:'post',
            data:new FormData(this),
            cache:false,
            contentType:false,
            processData:false,
            success: function(dat) {
                $("#total-div").load("#total-div");
            }
            
        });    
    });
});
