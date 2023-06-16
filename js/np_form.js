$(document).ready(function () {


    // function getImagePreview(event){
        
    //     var image = URL.createObjectURL(event.target.files[0]);
    //     var imagediv = document.getElementById('preview');
    //     var newimg = document.createElement('img');
    //     imagediv.innerHTML='';
    //     newimg.src=image;
    //     newimg.width="30";
    //     imagediv.appendChild(newimg);
    // }

    document.querySelector("#files").addEventListener("change", (e) => {
        if(window.File && window.FileReader && window.FileList && window.Blob){
            var files = e.target.files;
            var output = document.querySelector(".img-result");
            output.innerHTML='';
           

            for (var i = 0; i < files.length; i++) {
                if (!files[i].type.match("image"))continue;
                var picReader = new FileReader();
                picReader.addEventListener("load",function(event){
                    var picFile = event.target;
                    var nos = picFile.result;
                    var newImg = document.createElement('img');
                    newImg.src=nos;
                    output.appendChild(newImg);
                    output.style='height:200px;';
                    
                });
                picReader.readAsDataURL(files[i]);
                
            }

            

        }else{
            alert("Your browser does not support the file API");
        }
    })
});


