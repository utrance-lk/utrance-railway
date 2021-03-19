var result=10;
function triggerClick(){
    document.querySelector('#photo').click();
    

}


function displayImage(e){
    
    if(e.files[0]){
        var reader=new FileReader();
    
         reader.onload=function(e){
             var img=new Image;
             img.src=e.target.result;
             img.onload=function(){
                 if(img.width === 128 && img.height === 128){
                    document.querySelector('#image_preview').setAttribute('src',e.target.result);
                 }else{
                    alert("Please Add image in 128 pixels!!!!");
                 }
             }
                
            }
        
        
        reader.readAsDataURL(e.files[0]);
    }
}

