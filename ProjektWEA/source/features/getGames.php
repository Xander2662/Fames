<?php
include ("sql_ifs.php");
$sql = "SELECT * FROM Games";
$result = mysqli_query($con, $sql);
if (!$result) {
  die("Query failed: " . mysqli_error($con));
}


for ($i = 1; $i <= mysqli_num_rows($result); $i++) {
  $row = mysqli_fetch_array($result);
  $id[$i] = $row['idGames'];
  $name[$i] = $row['name'];
  $info[$i] = $row['info'];
  $color[$i] = $row['color'];
}
