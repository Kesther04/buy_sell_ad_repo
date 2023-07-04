$(document).ready(function () {
   
    $("#cat").change(function () {
        $(".cat-typ").css({'visibility':'visible','height':'100%','width':'100%'});
        var catna = $("#cat").val();
        xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","bf_item_upload.php?items="+catna,false);
        xmlhttp.send(null);
        $("#item").html(xmlhttp.responseText);
    
    }); 

    $("#item").change(function () {
        // $(".itit").css({'visibility':'visible'});
        var catna = $("#item").val();
        var batna = $("#cat").val();
        xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","full_cat_img.php?items="+catna+"&bitem="+batna,false);
        xmlhttp.send(null);
        $(".itit").html(xmlhttp.responseText);
    
    }); 

    $("#igroup").change(function () {
        var group = $("#igroup").val();
        xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","item_up_bf_sel.php?items="+group,false);
        xmlhttp.send(null);
        $("#smic").html(xmlhttp.responseText);
    
    }); 

    
    $("#smic").change(function () {
        var group = $("#smic").val();
        xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","item_up_sel.php?items="+group,false);
        xmlhttp.send(null);
        $("#sii").html(xmlhttp.responseText);
    
    }); 



    
    $("#min").keyup(function () {
        var fna = $("#min").val();
        var lna = $("#max").val();
        var b = fna+'|'+lna;
        $("#fsort").val(b);
    });

    $("#max").keyup(function () {
        var fna = $("#min").val();
        var lna = $("#max").val();
        var b = fna+'|'+lna;
        $("#fsort").val(b);
    });
   

    
    
    $("#asort").change(function () {
        var group = $("#asort").val();
        var pn = $(".pn").val();
        xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../../commodity_var.php?items="+group+"&pn="+pn,false);
        xmlhttp.send(null);
        $(".inner-snd-mcpc").html(xmlhttp.responseText);
    
    }); 
    
    $("#bsort").change(function () {
        var group = $("#bsort").val();
        var pn = $(".pn").val();
        xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../../commodity_var.php?items="+group+"&pn="+pn,false);
        xmlhttp.send(null);
        $(".inner-snd-mcpc").html(xmlhttp.responseText);
    
    }); 

    
    $("#csort").change(function () {
        var group = $("#csort").val();
        var pn = $(".pn").val();
        xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../../commodity_var.php?items="+group+"&pn="+pn,false);
        xmlhttp.send(null);
        $(".inner-snd-mcpc").html(xmlhttp.responseText);
    
    }); 

    
    $("#dsort").change(function () {
        var group = $("#dsort").val();
        var pn = $(".pn").val();
        xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../../commodity_var.php?items="+group+"&pn="+pn,false);
        xmlhttp.send(null);
        $(".inner-snd-mcpc").html(xmlhttp.responseText);
    
    }); 

    
    $("#esort").change(function () {
        var group = $("#esort").val();
        var pn = $(".pn").val();
        xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../../commodity_var.php?items="+group+"&pn="+pn,false);
        xmlhttp.send(null);
        $(".inner-snd-mcpc").html(xmlhttp.responseText);
    
    }); 

    
    $("#fsort").change(function () {
        var group = $("#fsort").val();
        var pn = $(".pn").val();
        xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","../../commodity_var.php?items="+group+"&pn="+pn,false);
        xmlhttp.send(null);
        $(".inner-snd-mcpc").html(xmlhttp.responseText);
    
    }); 


    
});