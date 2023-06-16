$(document).ready(function () {

    $("#abt-sel").click(function () {

        $("#masag-cot").css({'visibility':'visible'});    
        $(".inner-masag-cot-back").click(function () {
           $("#masag-cot").css({'visibility':'hidden'}); 
        });
    })

});