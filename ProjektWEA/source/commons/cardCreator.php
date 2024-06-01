
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
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>¨
        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
        <script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>
    </head>
    <script>
  $( function() {
    var availableTags = [
      "ActionScript",
      "AppleScript",
      "Asp",
      "BASIC",
      "C",
      "C++",
      "Clojure",
      "COBOL",
      "ColdFusion",
      "Erlang",
      "Fortran",
      "Groovy",
      "Haskell",
      "Java",
      "JavaScript",
      "Lisp",
      "Perl",
      "PHP",
      "Python",
      "Ruby",
      "Scala",
      "Scheme"
    ];
    $( "#tags" ).autocomplete({
      source: availableTags
    });
  } );
  </script>
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
    <style>

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
            <?php
            $key = array_search('ELDEN RING', $name);
            echo $key;
            ?>
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
