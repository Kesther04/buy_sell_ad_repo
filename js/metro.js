$(document).ready(function () {

    $(".feature-div").submit(function(e){
        e.preventDefault();
        $.ajax({
            url:'backend_item_feature.php',
            type:'post',
            data:new FormData(this),
            cache:false,
            contentType:false,
            processData:false,
            success: function(dat) {
                $(".con-mat").slideDown(1000).css({'visibility':'visible'});
                $(".mat").html(dat); 
                // $("#gen-feat-div").load(location.href+"#gen-feat-div");   
            }
            
        });    
        
        
    });


})