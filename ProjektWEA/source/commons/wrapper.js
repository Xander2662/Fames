const canvas = document.getElementById('myCanvas');
        const obrazek = document.getElementById('obrazek');
        var context = canvas.getContext('2d');
        var x=0,y=0;
      var imageObj = new Image();
      var source;
      obrazek.addEventListener("change", function () {
       getImgData();
       context.drawImage(imageObj,0,0);      
            });
      

            function getImgData() {
  const files = obrazek.files[0];
  if (files) {
    const fileReader = new FileReader();
    fileReader.readAsDataURL(files);
    fileReader.addEventListener("load", function () {

      source=this.result;
      imageObj.src = source;
    });    
  }
}
      imageObj.onload = function() {
          context.drawImage(imageObj,0,0);
          var data = canvas.toDataURL("image/jpeg");
          document.getElementById("GO/JOVER").value =data;
          console.log(imageObj.naturalWidth);
       console.log(imageObj.naturalHeight);
       document.getElementById('x').setAttribute("min",-imageObj.naturalWidth+720);
       document.getElementById('y').setAttribute("min",-imageObj.naturalHeight+1050);
          
  }; 
 
  document.getElementById("x").oninput = function() {
    var data = canvas.toDataURL("image/jpeg");
    document.getElementById("GO/JOVER").value =data;
    x=this.value;
    console.log(  document.getElementById("games").value);
   context.drawImage(imageObj,x,y);
  }
  document.getElementById("y").oninput = function() {
    var data = canvas.toDataURL("image/jpeg");
    document.getElementById("GO/JOVER").value =data;
    y=this.value;
   context.drawImage(imageObj,x,y);
  }
