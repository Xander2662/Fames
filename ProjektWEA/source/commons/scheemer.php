<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../assets/index.css">
    <link rel="stylesheet" href="../assets/header.css">
    <link rel="stylesheet" href="../assets/cardstyle.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body>
    <div class="hero">
        <?php include 'header.php' ?>
        <div class="home">
        <div class="card">  
            <div class="title"> CARD TITLE</div>
            <div class="like"><p>50000</p></div>
            <div class="gem"></div>
           <img class="picture" src="../../public/user.png">
         <div class="text"></div>
         <p class="iden1">Cardset: </p>
         <p class="iden2">user: </p>
        </div>

        <div class="inputs">
        <label>Border:</label>
        <input style=" accent-color: red;" type="range"  min="0" max="255" value="0" class="slider-square" id="r">
        <input style=" accent-color: green;" type="range"  min="0" max="255" value="0" class="slider-square" id="g">
        <input type="range" min="0" max="255" value="0" class="slider-square" id="b">
        <label>Background:</label>
        <input style=" accent-color: red;" type="range"  min="0" max="255" value="0" class="slider-square" id="r1">
        <input style=" accent-color: green;" type="range"  min="0" max="255" value="0" class="slider-square" id="g1">
        <input type="range" min="0" max="255" value="0" class="slider-square" id="b1">
            </div>   

        </div>
    </div>

    <script>
 var s = document.querySelector(':root');




var r=0,g=0,b=0,r1=0,g1=0,b1=0;



document.getElementById("r").oninput = function() {
   r=this.value;
   s.style.setProperty('--border', r+","+g+","+b);
}
document.getElementById("g").oninput = function() {
    g=this.value;
    s.style.setProperty('--border', r+","+g+","+b);
}
document.getElementById("b").oninput = function() {
    b=this.value;
    s.style.setProperty('--border', r+","+g+","+b);
}

document.getElementById("r1").oninput = function() {
   r1=this.value;
   s.style.setProperty('--background', r1+","+g1+","+b1);
}
document.getElementById("g1").oninput = function() {
    g1=this.value;
    s.style.setProperty('--background', r1+","+g1+","+b1);
}
document.getElementById("b1").oninput = function() {
    b1=this.value;
    s.style.setProperty('--background', r1+","+g1+","+b1);
}


</script>


    <script>
        let subMenu = document.getElementById("subMenu");

        function toggleMenu() {
            subMenu.classList.toggle("open-menu");
        }

    </script>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>