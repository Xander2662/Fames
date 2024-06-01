
<?php
require '../../features/sql_ifs.php';

$sql = "SELECT * FROM games";
$result = mysqli_query($con, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read Games</title>
</head>
<body>
    <h1>Games</h1>
    <?php while ($game = mysqli_fetch_assoc($result)): ?>
        <div>
            <h3><?php echo htmlspecialchars($game['name']); ?></h3>
            <p>Info: <?php echo htmlspecialchars($game['info']); ?></p>
            <p>Color: <?php echo htmlspecialchars($game['color']); ?></p>
            <a href="games_edit.php?id=<?php echo $game['idGames']; ?>">Edit</a>
            <a href="games_delete.php?id=<?php echo $game['idGames']; ?>">Delete</a>
        </div>
    <?php endwhile; ?>
    <a href="games_create.php">Create New Game</a>
</body>
</html>
