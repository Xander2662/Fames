
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">   
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>Home</title>
        <link rel="stylesheet" href="../assets/index.css">
        <link rel="stylesheet" href="../assets/header.css">
        <link rel="stylesheet" href="../assets/cardCreator.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    </head>
    <script>
  $( function() {
    var availableGames = [
        <?php
            include "../features/getGames.php";
            foreach ($name as $x) {
                echo "\"$x\",";
              }
        ?>        
    ];
    $( "#games" ).autocomplete({
      source: availableGames
    });
  } );
  </script>
    <body>
        <div class="hero">
        <?php include 'header.php' ?>

            <div class="home">
            <div class="card">  
              <input class="title" type="text">
              <div class="like"></div>
              <div class="gem"></div><canvas id="myCanvas" width="720" height="1050"></canvas>
              <textarea class="text"></textarea>
            </div>
            
            <div class="inputs">
                <a id="download" download="img-bozi.jpeg" href="#">stahni</a>
                <input id="obrazek" type="file" accept="image/png, image/jpeg" />
                <input type="range"  max="0" value="0" class="slider-square" id="x">
                <input type="range"  max="0" value="0" class="slider-square" id="y"><label for="tags">Tags: </label>
  <input id="games">
            </div>   
            </div>
        </div>
        
        <script>
            let subMenu = document.getElementById("subMenu");

            function toggleMenu() {
                subMenu.classList.toggle("open-menu");
            }

        </script>
        
        <script  src="./wrapper.js"></script>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </body>
</html>
