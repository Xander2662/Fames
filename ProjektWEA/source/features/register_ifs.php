<?php
include ('sql_ifs.php');
if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['repeat-password']) && isset($_POST['email'])) {
    $username = validate($_POST['username']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $repeat_password = validate($_POST['repeat-password']);

    if (empty($username)) {
        header("Location: ../commons/login.php?err=No ták nějaký to jméno si vymysli");
        exit();
    } else if (empty($password)) {
        header("Location: ../commons/login.php?err=To jakože chceš mít učet bez hesla?");
        exit(); 
    } else if (empty($repeat_password)) {
        header("Location: ../commons/login.php?err=Musíte znovu napsat vaše heslo...");
        exit();
    } else if ($password != $repeat_password) {
        header("Location: ../commons/login.php?err=Napsali jste špatně vaše heslo");
        exit();
    } else if (empty($email)) {
        header("Location: ../commons/login.php?err=Nezadal si email xd");
        exit();
    } else {
        $sql = "SELECT * FROM users WHERE username = '$username'";

        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            if ($row['username'] === $username) {
                header("Location: ../commons/login.php?err=UŽivatel už existuje");
                exit();
            }

        } else {

            $password = md5($password);

            $sql1 = "INSERT INTO users (username,password,email,permission)VALUES('$username', '$password','$email',1)";

            $result1 = mysqli_query($con, $sql1);

            if ($result1) {
                header("Location: ../commons/login.php?vyt=Podařilo se vytvořit váš účet!");
                exit();
            } else {
                header("Location: ../commons/login.php?err=Uživatele se nepodařilo vytvořit!");
            }

        }
    }
}
?>