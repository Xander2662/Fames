<?php
include_once ("../../features/User.php");
session_start();
if ($_SESSION['User']->getPermission() === 1 || !isset($_SESSION['User'])) {
    header("../../commons/index.php");
}
require '../../features/sql_ifs.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = validate($_POST['name']);
    $info = validate($_POST['info']);
    $color = validate($_POST['color']);

    $sql = "INSERT INTO Games (name, info, color) VALUES ('$name', '$info', '$color')";
    $result = mysqli_query($con, $sql);

    if ($result) {
        header("Location: games_read.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Game</title>
</head>

<body>
    <h1>Create Game</h1>
    <form action="games_create.php" method="POST">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br>
        <label for="info">Info:</label><br>
        <textarea id="info" name="info" required></textarea><br>
        <label for="color">Color:</label><br>
        <input type="text" id="color" name="color" required><br>
        <input type="submit" value="Create">
    </form>
</body>

</html>