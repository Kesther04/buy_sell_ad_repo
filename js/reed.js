$(document).ready(function () {

    $("#p-p-p").click(function () {
        $("#p-a-t").css({'display':'flex'}); 
    });

    
    var pass = $("#p-p-p");
    var gas = $("#g-g-g");
    var chk = $('input[type="checkbox"]');
    
    
    
    chk.click(function () {

        if (pass.attr("type")=="password") {
            pass.attr("type","text");

        }else {
            pass.attr("type","password");
        }

        
        if (gas.attr("type")=="password") {
            gas.attr("type","text");

        }else {
            gas.attr("type","password");
        }
    })


    
   

    
});
