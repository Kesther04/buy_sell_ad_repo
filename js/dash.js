$(document).ready(function () {
    
    var md = $(".dashboard"); 
    $('#peon').click(function(){
        md.slideDown(1000).css({'visibility':'visible'});
    })

    $('#losec').click(function(){
        md.slideUp(1000).css({'visibility':'hidden'});
    })

    var dash = $(".af-fst-header");
    $("#naf-open").click(function () {
       dash.slideDown(1000).css({'display':'flex'}); 
    });

    $("#naf-close").click(function () {
       dash.slideUp(1000).css({'display':'none'}); 
    });
   

    $("#show-con").click(function () {
        $("#hide-con").css({'display':'block'});     
        $("#show-con").css({'display':'none'});
    });


    $("#hide-con").click(function () {
        $("#show-con").css({'display':'block'});     
        $("#hide-con").css({'display':'none'});
    });

    $(".inner-fst-snd-container nav ul li ul .backfst-nav .inner-masag-cot-back").click(function () {
        $("inner-fst-snd-container nav ul li:focus > ul,.inner-fst-snd-container nav ul li:hover > ul").css({'visibility':'hidden','opacity':'0'});
        $("#total-div").load("#total-div");
    });


})