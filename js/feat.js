$(document).ready(function () {

            
    var feat = 
    '<tr>'
        +'<td>'
            +'<span>Feature Name</span>' 
            +'<input type="text" name="fnm[]" placeholder="Enter feature name" required>' 
        +'</td>'
        
        +'<td>' 
            +'<span>Feature Properties</span>' 
            +'<textarea name="fpr[]" placeholder="Divide the feature properties by using underscore" required></textarea>' 
        +'</td>'
    +'</tr>'

    $("#bcl").click(function(){
        
        $(".fir-div-container table").append(feat);
    }); 

    $("#ccl").click(function(){
        
        $(".upp table").append(feat);
    }); 
});