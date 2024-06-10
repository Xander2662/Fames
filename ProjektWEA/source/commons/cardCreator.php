
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
    
    <body>
        <div class="hero">
        <?php // include 'header.php' ?>
            <div class="home">
            <div class="card">
                
            <form action="check.php" method="POST">  
              <input class="title" name="title" type="text" required>
              <div class="like"></div>
              <div class="gem"></div><canvas id="myCanvas" width="720" height="1050"></canvas>
              <textarea name="text" class="text"></textarea>
              <input id="GO/JOVER" style="display:none" name="obrazek" type="text" required>
            </div>
        
            <div class="inputs">
                <input id="obrazek"  type="file" accept="image/png, image/jpeg" />
                <input type="range"  max="0" value="0" class="slider-square" id="x">
                <input type="range"  max="0" value="0" class="slider-square"style="margin-bottom: 20px;" id="y"><label style="color:white;"  for="tags">Card set: </label>  
                <select name="cardset" id="cardset" required>
                <?php
                include "../features/getGames.php";

            for($i=1;$i<=sizeof($id);$i++) {
                echo "<option value='".$id[$i]."'>".$name[$i]."</option>";
            }
            ?>   
                </select>
                <input type="submit" value="submit">
            </form>
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
