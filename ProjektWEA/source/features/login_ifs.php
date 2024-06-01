<?php
include('sql_ifs.php');
$text= mysqli_real_escape_string($con, $_POST["text"]); //username or email
$password= mysqli_real_escape_string($con, $_POST["password"]);
$sql = "SELECT * FROM users WHERE username = '$text' OR email = '$text'";
$result = mysqli_query($con, $sql);

if (!$result) {
  die("Query failed: " . mysqli_error($con));
}

if (mysqli_num_rows($result)   > 0) {
  $row = mysqli_fetch_assoc($result);
  if ($row["password"] === md5($password)) {
    Header("Location: ../commons/index.php");
  } else {
    Header("Location: ../commons/login.php?err=Špatné heslo");
  }
} else {
    echo "username: ".$username;
    echo $_POST["email"];
    echo $password;
}

// Close the connection
mysqli_close($con);
