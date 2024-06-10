<?php
include_once ("../../features/User.php");
session_start();
if ($_SESSION['User']->getPermission() === 1) {
    header("../../commons/index.php");
}
require '../../features/sql_ifs.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $text = validate($_POST['text']);
    $post_id = validate($_POST['post_id']);

    $sql = "INSERT INTO Reports (text, post_id) VALUES ('$text', '$post_id')";
    $result = mysqli_query($con, $sql);

    if ($result) {
        header("Location: reports_read.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
}

$sql_posts = "SELECT * FROM Posts";
$result_posts = mysqli_query($con, $sql_posts);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Report</title>
</head>

<body>
    <h1>Create Report</h1>
    <form action="reports_create.php" method="POST">
        <label for="text">Text:</label><br>
        <textarea id="text" name="text" required></textarea><br>
        <label for="post_id">Post:</label><br>
        <select id="post_id" name="post_id" required>
            <?php while ($post = mysqli_fetch_assoc($result_posts)): ?>
                <option value="<?php echo $post['idPost']; ?>"><?php echo htmlspecialchars($post['text']); ?></option>
            <?php endwhile; ?>
        </select><br>
        <input type="submit" value="Create">
    </form>

</body>

</html>