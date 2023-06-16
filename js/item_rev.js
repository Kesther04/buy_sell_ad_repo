$(document).ready(function () {

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
        var id = $(".cidn").val();
        xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","commodity_var.php?items="+group+"&pn="+pn+"&id="+id,false);
        xmlhttp.send(null);
        $(".inner-snd-mcpc").html(xmlhttp.responseText);
    
    }); 
    
    $("#bsort").change(function () {
        var group = $("#bsort").val();
        var pn = $(".pn").val();
        var id = $(".cidn").val();
        xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","commodity_var.php?items="+group+"&pn="+pn+"&id="+id,false);
        xmlhttp.send(null);
        $(".inner-snd-mcpc").html(xmlhttp.responseText);
    
    }); 

    
    $("#csort").change(function () {
        var group = $("#csort").val();
        var pn = $(".pn").val();
        var id = $(".cidn").val();
        xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","commodity_var.php?items="+group+"&pn="+pn+"&id="+id,false);
        xmlhttp.send(null);
        $(".inner-snd-mcpc").html(xmlhttp.responseText);
    }); 

    
    $("#dsort").change(function () {
        var group = $("#dsort").val();
        var pn = $(".pn").val();
        var id = $(".cidn").val();
        xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","commodity_var.php?items="+group+"&pn="+pn+"&id="+id,false);
        xmlhttp.send(null);
        $(".inner-snd-mcpc").html(xmlhttp.responseText);
    
    }); 

    
    $("#esort").change(function () {
        var group = $("#esort").val();
        var pn = $(".pn").val();
        var id = $(".cidn").val();
        xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","commodity_var.php?items="+group+"&pn="+pn+"&id="+id,false);
        xmlhttp.send(null);
        $(".inner-snd-mcpc").html(xmlhttp.responseText);
    
    }); 

    
    $("#fsort").change(function () {
        var group = $("#fsort").val();
        var pn = $(".pn").val();
        var id = $(".cidn").val();
        xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","commodity_var.php?items="+group+"&pn="+pn+"&id="+id,false);
        xmlhttp.send(null);
        $(".inner-snd-mcpc").html(xmlhttp.responseText);
    
    }); 
    
});