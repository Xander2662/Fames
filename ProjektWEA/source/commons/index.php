<?php
include_once ("../features/User.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../assets/index.css">
    <link rel="stylesheet" href="../assets/cardstyle.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body>
    <div class="hero">
        <?php include 'header.php' ?>
        <div class="home" id ="pole">
            <div class="intro">
                <h1>WELCOME TO FAMES</h1>
                <p>Tu muzem napsat nejaky text voleee</p>
            </div>

            <!-----------------------------------
                *      Zde si muzes vlozit ty       *
                *      herni karty podle sebe       *                                   
                ------------------------------------>

        </div>
    </div>

    <script>
        let subMenu = document.getElementById("subMenu");

        function toggleMenu() {
            subMenu.classList.toggle("open-menu");
        }

    </script>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <?php
    include "../features/cardIN.php";
    ?>
</body>

</html>