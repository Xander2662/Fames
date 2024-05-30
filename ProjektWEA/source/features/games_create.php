<?php
include('sql.php');
$name = validate($_POST['name']);
$color = validate($_POST['color']);
$info = validate($_POST['info']);
$result = mysqli_query($con, $sql);
if(empty($name)){
   exit();
}else if(empty($color)){
        exit();
}
else {
    $sql = "SELECT * FROM games WHERE name = '$name'"; 

    $result = mysqli_query($con, $sql);

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        if($row['name'] === $name){
            exit();
        }
    }else{
        $sql1 = "INSERT INTO games (name,color,info)VALUES('$name', '$color','$info')";

        $result1 = mysqli_query($con, $sql1);

        if($result1){
            header("Location: games_create.php?vyt=Hra vytvořena");
            exit();
        }else{
            header("Location: games_create.php?err=error");
           exit();
        }
    }
}
// Close the connection
mysqli_close($con);
?>