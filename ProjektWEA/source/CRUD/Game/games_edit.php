<?php
include_once ("../../features/User.php");
session_start();
if ($_SESSION['User']->getPermission() === 1) {
    header("../../commons/index.php");
}
require '../../features/sql_ifs.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM Games WHERE idGames = $id";
    $result = mysqli_query($con, $sql);
    $game = mysqli_fetch_assoc($result);

    if (!$game) {
        die('Game not found');
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = validate($_POST['name']);
    $info = validate($_POST['info']);
    $color = validate($_POST['color']);

    $sql = "UPDATE Games SET name='$name', info='$info', color='$color' WHERE idGames=$id";
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
    <title>Edit Game</title>
</head>

<body>
    <h1>Edit Game</h1>
    <form action="games_edit.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $game['idGames']; ?>">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($game['name']); ?>" required><br>
        <label for="info">Info:</label><br>
        <textarea id="info" name="info" required><?php echo htmlspecialchars($game['info']); ?></textarea><br>
        <label for="color">Color:</label><br>
        <input type="text" id="color" name="color" value="<?php echo htmlspecialchars($game['color']); ?>" required><br>
        <input type="submit" value="Update">
    </form>
</body>

</html>