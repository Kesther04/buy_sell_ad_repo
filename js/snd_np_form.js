$(document).ready(function () {
    document.querySelector("#files").addEventListener("change", (e) => {
        if(window.File && window.FileReader && window.FileList && window.Blob){
            var files = e.target.files;

            var outputDiv = document.querySelector(".prod-img-show .img-result ");
            outputDiv.innerHTML='';
           
            for (var i = 0; i < files.length; i++) {
                if (!files[i].type.match("image"))continue;
                var picReader = new FileReader();
                picReader.addEventListener("load",function(event){
                    var picFile = event.target;
                    var nos = picFile.result;
                    var newImg = document.createElement('img');
                    newImg.src=nos;
                    outputDiv.appendChild(newImg);
                    
                });
                picReader.readAsDataURL(files[i]);
                
            }
            

        }else{
            alert("Your browser does not support the file API");
        }
    }) 
});


