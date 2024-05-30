<?php
include('sql.php');
$username= mysqli_real_escape_string($con, $_POST["username"]);
$email= mysqli_real_escape_string($con, $_POST["email"]);
$password= mysqli_real_escape_string($con, $_POST["password"]);
$sql = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
$result = mysqli_query($con, $sql);

if (!$result) {
  die("Query failed: " . mysqli_error($con));
}

if (mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);
  if ($row["password"] === md5($password)) {
    Header("Location: index.php");
  } else {
    Header("Location: login.php?err=Špatné heslo");
  }
} else {
    Header("Location: login.php?err=Uživatel nebyl nalezen");
}

// Close the connection
mysqli_close($con);
?>