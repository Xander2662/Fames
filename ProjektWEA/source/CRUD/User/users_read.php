<?php
include_once ("../../features/User.php");
session_start();
if ($_SESSION['User']->getPermission() === 1) {
    header("../../commons/index.php");
}
require '../../features/sql_ifs.php';

$sql = "SELECT * FROM Users";
$result = mysqli_query($con, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read Users</title>
</head>

<body>
    <h1>Users</h1>
    <?php while ($user = mysqli_fetch_assoc($result)): ?>
        <div>
            <h3><?php echo htmlspecialchars($user['username']); ?></h3>
            <p>Email: <?php echo htmlspecialchars($user['email']); ?></p>
            <p>Permission: <?php echo htmlspecialchars($user['permission']); ?></p>
            <a href="users_edit.php?id=<?php echo $user['idUsers']; ?>">Edit</a>
            <a href="users_delete.php?id=<?php echo $user['idUsers']; ?>">Delete</a>
        </div>
    <?php endwhile; ?>
    <a href="users_create.php">Create New User</a>
</body>

</html>