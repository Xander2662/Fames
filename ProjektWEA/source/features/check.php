<?php
include ('sql_ifs.php');
require_once './User.php';
session_start();

$text = validate($_POST['title']); //text v db je title postu
$user_id = $_SESSION['User']->getUserId();
$game_id = validate($_POST['cardset']); //id game
$popis = validate($_POST['text']); //popis v db je text postu

$sql = "INSERT INTO Post (text, Users_idusers, Games_idGames,popis,sumlikes) VALUES ('$text', '$user_id', '$game_id','$popis',0)";
$result = mysqli_query($con, $sql);

echo $_POST["title"];
echo "<br>";
echo $_POST["text"];
echo "<br>";
echo $_POST["cardset"];

$sql = "SELECT idPost FROM Post WHERE Users_idusers = '$user_id' ORDER BY idPost DESC LIMIT 1";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

echo "<img src='" . $_POST["obrazek"] . "'>";
file_put_contents("../../public/usrimg/".$row['idPost'].".jpeg", file_get_contents($_POST["obrazek"]));
echo $row['idPost'];
