
<?php
include_once ("../../features/User.php");
session_start();
if ($_SESSION['User']->getPermission() === 1) {
    header("../../commons/index.php");
}
require '../../features/sql_ifs.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM Users WHERE idUsers = $id";
    $result = mysqli_query($con, $sql);

    if ($result) {
        header("Location: users_read.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
}
?>
