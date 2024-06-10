
<?php
include_once ("../../features/User.php");
session_start();
if($_SESSION['User'] -> getPermission()===1) {
    header("../../commons/index.php");
    }
require '../../features/sql_ifs.php';

$sql = "SELECT Posts.*, users.username, games.name AS game_name FROM Posts
        JOIN Users ON posts.user_id = users.idUsers
        JOIN Games ON posts.game_id = games.idGames";
$result = mysqli_query($con, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read Posts</title>
</head>
<body>
    <h1>Posts</h1>
    <?php while ($post = mysqli_fetch_assoc($result)): ?>
        <div>
            <h3><?php echo htmlspecialchars($post['text']); ?></h3>
            <p>User: <?php echo htmlspecialchars($post['username']); ?></p>
            <p>Game: <?php echo htmlspecialchars($post['game_name']); ?></p>
            <p>Likes: <?php echo htmlspecialchars($post['sumlikes']); ?></p>
            <a href="posts_edit.php?id=<?php echo $post['idPost']; ?>">Edit</a>
            <a href="posts_delete.php?id=<?php echo $post['idPost']; ?>">Delete</a>
        </div>
    <?php endwhile; ?>
    <a href="posts_create.php">Create New Post</a>
</body>
</html>
