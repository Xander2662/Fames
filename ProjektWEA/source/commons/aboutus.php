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
    <link rel="stylesheet" href="../assets/aboutus.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body>
    <div class="hero">
        <?php include 'header.php' ?>
        <div class="home">
            <div class="intro">
                <h1>SUPPORT</h1>
            </div>

            <div class="about-text">
                <p>Welcome to Fames, the ultimate destination for game fashion enthusiasts and modding aficionados. Our
                    platform is dedicated to bringing together gamers from around the world who share a passion for
                    customizing and enhancing their gaming experiences.</p>
                <p>At Fames, we believe that gaming is more than just a pastime—it's a form of self-expression. Whether
                    you're a seasoned modder or a newcomer looking to explore the possibilities, our community is here
                    to support and inspire you. We offer a wide range of mods, collections, and media to help you
                    transform your favorite games into something truly unique.</p>
                <p>Our mission is to provide a space where creativity and innovation can thrive. We encourage our
                    members to share their creations, offer feedback, and collaborate on projects. With a wealth of
                    resources and a vibrant community, Fames is the perfect place to discover new ways to enjoy your
                    games.</p>
                <p>Thank you for being a part of Fames. Together, we can push the boundaries of what's possible in the
                    world of gaming. Join us and start your journey today!</p>
            </div>

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
</body>

</html>