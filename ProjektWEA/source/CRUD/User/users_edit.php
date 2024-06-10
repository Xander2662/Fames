<?php
include_once ("../../features/User.php");
session_start();
if ($_SESSION['User']->getPermission() === 1) {
    header("../../commons/index.php");
}
require '../../features/sql_ifs.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM Users WHERE idUsers = $id";
    $result = mysqli_query($con, $sql);
    $user = mysqli_fetch_assoc($result);

    if (!$user) {
        die('User not found');
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $username = validate($_POST['username']);
    $password = validate($_POST['password']);
    $email = validate($_POST['email']);
    $permission = validate($_POST['permission']);

    if (!empty($password)) {
        $password = md5($password);
        $sql = "UPDATE Users SET username='$username', password='$password', email='$email', permission='$permission' WHERE idUsers=$id";
    } else {
        $sql = "UPDATE Users SET username='$username', email='$email', permission='$permission' WHERE idUsers=$id";
    }

    $result = mysqli_query($con, $sql);

    if ($result) {
        header("Location: users_read.php");
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
    <title>Edit User</title>
</head>

<body>
    <h1>Edit User</h1>
    <form action="users_edit.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $user['idUsers']; ?>">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($user['username']); ?>"
            required><br>
        <label for="password">Password (leave blank to keep current password):</label><br>
        <input type="password" id="password" name="password"><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>"
            required><br>
        <label for="permission">Permission:</label><br>
        <input type="text" id="permission" name="permission"
            value="<?php echo htmlspecialchars($user['permission']); ?>" required><br>
        <input type="submit" value="Update">
    </form>
</body>

</html>