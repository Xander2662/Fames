<?php
$likes = 500;
$id = 1000;
$user = "kokoska";
$gameName = "Bruh";
$title = "thgd";
$popis = "hnfkjhg .mjhlkjhqn qůekjflůkn  kjlqhflkqjbnef ,.qwekmjhnhnflkn lqkwejfnblqkjnbf";
$color = "120,150,123R152,100,0";
echo "<div class='card' id='c" . $id . "' style='background-color:rgb(" . explode("R", $color)[0] . ");border-color:rgb(" . explode("R", $color)[1] . ");'>";
echo "<div class='title'style='border-color:rgb(" . explode("R", $color)[1] . ");'>" . $title . "</div>";
echo "<div class='like'style='border-color:rgb(" . explode("R", $color)[1] . ");'><p>" . $likes . "</p></div>";
echo "<div class='gem'style='border-color:rgb(" . explode("R", $color)[1] . ");'></div>";
echo "<img class='picture' style='border-color:rgb(" . explode("R", $color)[1] . ");' src='../../public/usrimg/" . $id . ".jpeg'>";
echo "<div class='text' style='border-color:rgb(" . explode("R", $color)[1] . ");'>" . $popis . "</div>";
echo "<p class='iden1'>Cardset: " . $gameName . "</p>";
echo "<p class='iden2'>user: " . $user . "</p>";
echo "</div>";