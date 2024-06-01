
<?php
require '../../features/sql_ifs.php';

$sql = "SELECT reports.*, posts.text AS post_text FROM reports
        JOIN posts ON reports.post_id = posts.idPost";
$result = mysqli_query($con, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read Reports</title>
</head>
<body>
    <h1>Reports</h1>
    <?php while ($report = mysqli_fetch_assoc($result)): ?>
        <div>
            <h3><?php echo htmlspecialchars($report['text']); ?></h3>
            <p>Related Post: <?php echo htmlspecialchars($report['post_text']); ?></p>
            <p>Date: <?php echo htmlspecialchars($report['date']); ?></p>
            <a href="reports_delete.php?id=<?php echo $report['idReport']; ?>">Delete</a>
        </div>
    <?php endwhile; ?>
    <a href="reports_create.php">Create New Report</a>
</body>
</html>
