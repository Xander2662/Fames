
<?php
require '../../features/sql_ifs.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM Reports WHERE idReport = $id";
    $result = mysqli_query($con, $sql);
    $report = mysqli_fetch_assoc($result);

    if (!$report) {
        die('Report not found');
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $text = validate($_POST['text']);
    $post_id = validate($_POST['post_id']);

    $sql = "UPDATE Reports SET text='$text', post_id='$post_id' WHERE idReport=$id";
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
    <title>Edit Report</title>
</head>
<body>
    <h1>Edit Report</h1>
    <form action="reports_edit.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $report['idReport']; ?>">
        <label for="text">Text:</label><br>
        <textarea id="text" name="text" required><?php echo htmlspecialchars($report['text']); ?></textarea><br>
        <label for="post_id">Post:</label><br>
        <select id="post_id" name="post_id" required>
            <?php while ($post = mysqli_fetch_assoc($result_posts)): ?>
                <option value="<?php echo $post['idPost']; ?>" <?php echo $post['idPost'] == $report['post_id'] ? 'selected' : ''; ?>><?php echo htmlspecialchars($post['text']); ?></option>
            <?php endwhile; ?>
        </select><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>