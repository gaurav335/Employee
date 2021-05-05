
$(".imgAdd").click(function(){
 
  if(count >= 9){
    return alert("No there more images!")
  }
  
    $(this).closest(".row").find('.imgAdd').before('<div class="col-sm-2 imgUp"><div class="imagePreview"></div><label class="btn btnn-primary">Upload<input type="file" name="images[]" class="uploadFile img" value="Upload Photo" style="width:0px;height:0px;overflow:hidden;"></label><i class="fa fa-times del"></i></div>');
    count++;
  });
  $(document).on("click", "i.del" , function() {
  // 	to remove card
  
  
  
  if(count < 1){
    return false;
  }  
  if(count > 10 ){
    return alert("No there more images!")
  }

  $(this).parent().remove();
  count--;
  
  // to clear image
    // $(this).parent().find('.imagePreview').css("background-image","url('')");
  });
  $(function() {
      $(document).on("change",".uploadFile", function()
      {
          var uploadFile = $(this);
          var files = !!this.files ? this.files : [];
          if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
   
          if (/^image/.test( files[0].type)){ // only image file
              var reader = new FileReader(); // instance of the FileReader
              reader.readAsDataURL(files[0]); // read the local file
   
              reader.onloadend = function(){ // set image data as background of div
                  //alert(uploadFile.closest(".upimage").find('.imagePreview').length);
  uploadFile.closest(".imgUp").find('.imagePreview').css("background-image", "url("+this.result+")");
              }
          }
        
      });
  });

