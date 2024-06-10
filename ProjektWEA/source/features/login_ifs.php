<?php
include ('sql_ifs.php');
$text = mysqli_real_escape_string($con, $_POST["text"]); //username or email
$password = mysqli_real_escape_string($con, $_POST["password"]);
$sql = "SELECT * FROM Users WHERE username = '$text' OR email = '$text'";
$result = mysqli_query($con, $sql);

if (!$result) {
  die("Query failed: " . mysqli_error($con));
}

if (mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);
  if ($row["password"] === md5($password)) {
    require_once '../features/User.php';
    session_start();
    $_SESSION['Logged'] = true;
    $_SESSION['User'] = new User($row['idUsers'], $row['username'], $row['permission']);
    Header("Location: ../commons/index.php");
  } else {
    Header("Location: ../commons/login.php?err=Špatné heslo");
  }
} else {
  Header("Location: ../commons/login.php?err=Účet s tímto jménem nebo emailem neexistuje");
}

// Close the connection
mysqli_close($con);
