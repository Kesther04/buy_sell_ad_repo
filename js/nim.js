$(document).ready(function () {

    $(".prof-det-img").click(function () {

        $("#masag-cot").css({'visibility':'visible'});    
        $(".inner-masag-cot-back").click(function () {
           $("#masag-cot").css({'visibility':'hidden'}); 
        });
    })
    
    // $("#xen").click(function () {
    //     $(".msg-xy").css({'visibility':'visible'});        
    //     var group = $("#xen input").val();
    //     xmlhttp = new XMLHttpRequest();
    //     xmlhttp.open("GET","profile_update.php?items="+group,false);
    //     xmlhttp.send(null);
    //     $(".msa").html(xmlhttp.responseText);
    //     $(".inner-masag-cot-back").click(function () {
    //         $(".msg-xy").css({'visibility':'hidden'}); 
    //     });
    // }); 


});