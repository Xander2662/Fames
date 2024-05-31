<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">   
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>Home</title>
        <link rel="stylesheet" href="../assets/index.css">
        <link rel="stylesheet" href="../assets/cardstyle.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    </head>
    <body>
    <style>
      
      canvas{
        background-color: red;
      }
     
    </style>
        <div class="hero">
            <nav>
                <a class="logo" href="index.html">Fames</a>
                <form>
                    <div class="search">
                        <span class="search-icon material-symbols-outlined">search</span>
                        <input class="search-input" type="search" placeholder="Search">
                    </div>
                </form>
                <ul>
                    <li><a href="#">Games</a></li>
                    <li><a href="#">Mods</a></li>
                    <li><a href="#">Collections</a></li>
                    <li><a href="#">Media</a></li>
                    <li><a href="#">Community</a></li>
                    <li><a href="#">Support</a></li>
                </ul>

                <img src="images/user.png" class="user-pic" onclick="toggleMenu()">

                <div class="sub-menu-wrap" id="subMenu">
                    <div class="sub-menu">
                        <div class="user-info">
                            <a href="login.html" class="sub-menu-link"></a>
                            <img src="images/user.png">
                            <h3>Jmeno</h3>
                        </div>
                        <hr>

                        <a href="#" class="sub-menu-link">
                            <img src="images/settings.png">
                            <p>Settings</p>
                        </a>
                        <a href="#" class="sub-menu-link">
                            <img src="images/logout.png">
                            <p>Logout</p>
                        </a>

                    </div>
                </div>

            </nav>

            <div class="home">        
                <!-----------------------------------
                *      Zde si muzes vlozit ty       *
                *      herni karty podle sebe       *                                   
                ------------------------------------>
                <div class="card">  
              <input class="title" type="text">
              <div class="like"></div>
              <div class="gem"></div><canvas id="myCanvas" width="720" height="1050"></canvas>
              <textarea class="text"></textarea>
              <p class="iden1">Cardset: </p>
             <p class="iden2">user: </p>
              

               </div>
                
                <a id="download" download="img-bozi.jpeg" href="#">stahni</a>
                <input id="obrazek" type="file" accept="image/png, image/jpeg" />
                <input type="range"  max="0" value="0" class="slider-square" id="x">
                <input type="range"  max="0" value="0" class="slider-square" id="y">




            </div>
        </div>
        
        <script>
            let subMenu = document.getElementById("subMenu");

            function toggleMenu() {
                subMenu.classList.toggle("open-menu");
            }

        </script>
        
        <script>
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
          document.getElementById("download").href =data;
          console.log(imageObj.naturalWidth);
       console.log(imageObj.naturalHeight);
       document.getElementById('x').setAttribute("min",-imageObj.naturalWidth+720);
       document.getElementById('y').setAttribute("min",-imageObj.naturalHeight+1050);
          
  }; 
 
  document.getElementById("x").oninput = function() {
    var data = canvas.toDataURL("image/jpeg");
    document.getElementById("download").href =data;
    x=this.value;
   context.drawImage(imageObj,x,y);
  }
  document.getElementById("y").oninput = function() {
    var data = canvas.toDataURL("image/jpeg");
    document.getElementById("download").href =data;
    y=this.value;
   context.drawImage(imageObj,x,y);
  }

      </script>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </body>
</html>