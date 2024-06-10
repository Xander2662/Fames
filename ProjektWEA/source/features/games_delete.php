<?php
include ('sql_ifs.php');
$name = validate($_POST['name']);
$result = mysqli_query($con, $sql);
if (empty($name)) {
    exit();
} else {
    $sql = "SELECT * FROM Games WHERE name = '$name'";

    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if ($row['name'] === $name) {
            $sql1 = "DELETE FROM Games WHERE name = '$name'";

            $result1 = mysqli_query($con, $sql1);

            if ($result1) {
                header("Location: games_delete.php?vyt=Hra vymazána");
                exit();
            } else {
                header("Location: games_delete.php?err=error");
            }
        }
    } else {
        exit();
    }
}
// Close the connection
mysqli_close($con);
?>