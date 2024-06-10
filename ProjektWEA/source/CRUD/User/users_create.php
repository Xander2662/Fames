
<?php
require '../../features/sql_ifs.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = validate($_POST['username']);
    $password = md5($_POST['password']);
    $email = validate($_POST['email']);
    $permission = validate($_POST['permission']);

    $sql = "INSERT INTO Users (username, password, email, permission) VALUES ('$username', '$password', '$email', '$permission')";
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
    <title>Create User</title>
</head>
<body>
    <h1>Create User</h1>
    <form action="users_create.php" method="POST">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="permission">Permission:</label><br>
        <input type="text" id="permission" name="permission" required><br>
        <input type="submit" value="Create">
    </form>
</body>
</html>
