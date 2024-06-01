
<?php
require '../../features/sql_ifs.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM posts WHERE idPost = $id";
    $result = mysqli_query($con, $sql);
    $post = mysqli_fetch_assoc($result);

    if (!$post) {
        die('Post not found');
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $text = validate($_POST['text']);
    $img_ref = validate($_POST['img_ref']);
    $user_id = validate($_POST['user_id']);
    $game_id = validate($_POST['game_id']);

    $sql = "UPDATE posts SET text='$text', img_ref='$img_ref', user_id='$user_id', game_id='$game_id' WHERE idPost=$id";
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
    <title>Edit Post</title>
</head>
<body>
    <h1>Edit Post</h1>
    <form action="posts_edit.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $post['idPost']; ?>">
        <label for="text">Text:</label><br>
        <textarea id="text" name="text" required><?php echo htmlspecialchars($post['text']); ?></textarea><br>
        <label for="img_ref">Image Reference:</label><br>
        <input type="text" id="img_ref" name="img_ref" value="<?php echo htmlspecialchars($post['img_ref']); ?>"><br>
        <label for="user_id">User:</label><br>
        <select id="user_id" name="user_id" required>
            <?php while ($user = mysqli_fetch_assoc($result_users)): ?>
                <option value="<?php echo $user['idUsers']; ?>" <?php echo $user['idUsers'] == $post['user_id'] ? 'selected' : ''; ?>><?php echo htmlspecialchars($user['username']); ?></option>
            <?php endwhile; ?>
        </select><br>
        <label for="game_id">Game:</label><br>
        <select id="game_id" name="game_id" required>
            <?php while ($game = mysqli_fetch_assoc($result_games)): ?>
                <option value="<?php echo $game['idGames']; ?>" <?php echo $game['idGames'] == $post['game_id'] ? 'selected' : ''; ?>><?php echo htmlspecialchars($game['name']); ?></option>
            <?php endwhile; ?>
        </select><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>
