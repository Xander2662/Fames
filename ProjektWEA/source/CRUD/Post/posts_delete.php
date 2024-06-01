
<?php
require '../../features/sql_ifs.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM posts WHERE idPost = $id";
    $result = mysqli_query($con, $sql);

    if ($result) {
        header("Location: posts_read.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
}
?>
