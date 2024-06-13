<?php
include_once ("User.php");
require_once ("sql_ifs.php");

$sql = "SELECT p.sumlikes,p.idPost,p.text,p.popis, g.name as gameName, g.color as gameColor, u.username as userName FROM Post p inner join Games g on p.Games_idGames = g.idGames, Users u WHERE p.Users_idusers = u.idUsers";
$result = mysqli_query($con, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    $likes = $row['sumlikes'];
    $id = $row['idPost'];
    $user = $row['userName'];  // Assuming the username is part of the User object
    $gameName = $row['gameName'];
    $title = $row['text'];
    $popis = $row['popis'];
    $color = $row['gameColor'];

    // Exploding color and ensuring it has at least two elements
    $colors = explode("R", $color);
    if (count($colors) >= 2) {
        list($bgColor, $borderColor) = $colors;
    } else {
        // Default colors if the explode didn't work as expected
        $bgColor = "255,255,255"; // Default white background
        $borderColor = "0,0,0";   // Default black border
    }

    echo "<div class='card' id='c" . $id . "' style='background-color:rgb(" . $bgColor . ");border-color:rgb(" . $borderColor . ");'>";
    echo "<div class='title' style='border-color:rgb(" . $borderColor . ");'>" . $title . "</div>";
    echo "<div class='like' style='border-color:rgb(" . $borderColor . ");'><p>" . $likes . "</p></div>";
    echo "<div class='gem' style='border-color:rgb(" . $borderColor . ");'></div>";
    echo "<img class='picture' style='border-color:rgb(" . $borderColor . ");' src='../../public/usrimg/" . $id . ".jpeg'>";
    echo "<div class='text' style='border-color:rgb(" . $borderColor . ");'>" . $popis . "</div>";
    echo "<p class='iden1'>Cardset: " . $gameName . "</p>";
    echo "<p class='iden2'>user: " . $user . "</p>";
    echo "</div>";
}