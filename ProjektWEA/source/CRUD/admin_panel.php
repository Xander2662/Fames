<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../assets/adminpanel.css">
    <title>Admin Panel</title>
</head>
<body>
    <div class="container">
        <h1>Admin Panel</h1>

        <div class="section">
            <h2>Game</h2>
            <ul>
                <li><a href="Game/games_create.php">Create Game</a></li>
                <li><a href="Game/games_read.php">Read Game</a></li>
                <li class="form-container">
                    <form action="Game/games_edit.php" method="GET">
                        <input type="text" name="id" placeholder="Enter Game ID to Edit" required>
                        <input type="submit" value="Edit Game">
                    </form>
                </li>
                <li class="form-container">
                    <form action="Game/games_delete.php" method="GET">
                        <input type="text" name="id" placeholder="Enter Game ID to Delete" required>
                        <input type="submit" value="Delete Game">
                    </form>
                </li>
            </ul>
        </div>

        <div class="section">
            <h2>Post</h2>
            <ul>
                <li><a href="Post/posts_create.php">Create Post</a></li>
                <li><a href="Post/posts_read.php">Read Post</a></li>
                <li class="form-container">
                    <form action="Post/posts_edit.php" method="GET">
                        <input type="text" name="id" placeholder="Enter Post ID to Edit" required>
                        <input type="submit" value="Edit Post">
                    </form>
                </li>
                <li class="form-container">
                    <form action="Post/posts_delete.php" method="GET">
                        <input type="text" name="id" placeholder="Enter Post ID to Delete" required>
                        <input type="submit" value="Delete Post">
                    </form>
                </li>
            </ul>
        </div>

        <div class="section">
            <h2>Report</h2>
            <ul>
                <li><a href="Report/reports_create.php">Create Report</a></li>
                <li><a href="Report/reports_read.php">Read Report</a></li>
                <li class="form-container">
                    <form action="Report/reports_delete.php" method="GET">
                        <input type="text" name="id" placeholder="Enter Report ID to Delete" required>
                        <input type="submit" value="Delete Report">
                    </form>
                </li>
            </ul>
        </div>

        <div class="section">
            <h2>User</h2>
            <ul>
                <li><a href="User/users_create.php">Create User</a></li>
                <li><a href="User/users_read.php">Read User</a></li>
                <li class="form-container">
                    <form action="User/users_edit.php" method="GET">
                        <input type="text" name="id" placeholder="Enter User ID to Edit" required>
                        <input type="submit" value="Edit User">
                    </form>
                </li>
                <li class="form-container">
                    <form action="User/users_delete.php" method="GET">
                        <input type="text" name="id" placeholder="Enter User ID to Delete" required>
                        <input type="submit" value="Delete User">
                    </form>
                </li>
            </ul>
        </div>
    </div>
</body>
</html>