
<?php
if($_SESSION['User'] -> getPermission()===1) {
    header("../../commons/index.php");
    }
require '../../features/sql_ifs.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $text = validate($_POST['text']);
    $img_ref = validate($_POST['img_ref']);
    $user_id = validate($_POST['user_id']);
    $game_id = validate($_POST['game_id']);

    $sql = "INSERT INTO posts (text, img_ref, user_id, game_id) VALUES ('$text', '$img_ref', '$user_id', '$game_id')";
    $result = mysqli_query($con, $sql);

    if ($result) {
        header("Location: posts_read.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
}

$sql_users = "SELECT * FROM users";
$result_users = mysqli_query($con, $sql_users);

$sql_games = "SELECT * FROM games";
$result_games = mysqli_query($con, $sql_games);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
</head>
<body>
    <h1>Create Post</h1>
    <form action="posts_create.php" method="POST">
        <label for="text">Text:</label><br>
        <textarea id="text" name="text" required></textarea><br>
        <label for="img_ref">Image Reference:</label><br>
        <input type="text" id="img_ref" name="img_ref"><br>
        <label for="user_id">User:</label><br>
        <select id="user_id" name="user_id" required>
            <?php while ($user = mysqli_fetch_assoc($result_users)): ?>
                <option value="<?php echo $user['idUsers']; ?>"><?php echo htmlspecialchars($user['username']); ?></option>
            <?php endwhile; ?>
        </select><br>
        <label for="game_id">Game:</label><br>
        <select id="game_id" name="game_id" required>
            <?php while ($game = mysqli_fetch_assoc($result_games)): ?>
                <option value="<?php echo $game['idGames']; ?>"><?php echo htmlspecialchars($game['name']); ?></option>
            <?php endwhile; ?>
        </select><br>
        <input type="submit" value="Create">
    </form>
</body>
</html>
