$(document).ready(function () {
    var pass = $(".p-pass");
    var chk = $('input[type="checkbox"]');
    
    
    
        chk.click(function () {

            if (pass.attr("type")=="password") {
                pass.attr("type","text");

            }else {
                pass.attr("type","password");
            }
        })
    
});


