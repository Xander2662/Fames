<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>Login</title>
        <link rel="stylesheet" href="../assets/login.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    </head>
    <body >
        <div class="hero">
        <?php include 'header.php' ?>

            <div class="wrapper">
                <span class="icon-close">
                    <ion-icon name="close-outline"></ion-icon>
                </span>
    
                <div class="form-box login">
                    <h2>Login</h2>
                    <form action="../features/login_ifs.php">
                        <div class="input-box">
                            <span class="icon">
                                <ion-icon name="mail"></ion-icon>
                            </span>
                            <input type="email" required>
                            <label>Email</label>
                        </div>
                        <div class="input-box">
                            <span class="icon">
                                <ion-icon name="lock-closed"></ion-icon>
                            </span>
                            <input type="password" required>
                            <label>Password</label>
                        </div>
                        <div class="remember-forgot">
                            <label><input type="checkbox"> Remember me</label>
                            <a href="#">Forgot password?</a>
                        </div>
                        <button type="submit" class="btn">Login</button>
                        <div class="login-register">
                            <p>Dont have an account? <a href="#" class="register-link">Register</a></p>
                        </div>
                    </form>
                </div>
    
                <div class="form-box register">
                    <h2>Registration</h2>
                    <form action="../register_ifs.php">
                        <div class="input-box">
                            <span class="icon">
                                <ion-icon name="person-outline"></ion-icon>
                            </span>
                            <input type="text" required>
                            <label>Username</label>
                        </div>
                        <div class="input-box">
                            <span class="icon">
                                <ion-icon name="mail"></ion-icon>
                            </span>
                            <input type="email" required>
                            <label>Email</label>
                        </div>
                        <div class="input-box">
                            <span class="icon">
                                <ion-icon name="lock-closed"></ion-icon>
                            </span>
                            <input type="password" required>
                            <label>Password</label>
                        </div>
                        <div class="remember-forgot">
                            <label><input type="checkbox">I agree to the terms & conditions</label>
                        </div>
                        <button type="submit" class="btn">Register</button>
                        <div class="login-register">
                            <p>Already have an account? <a href="#" class="login-link">Login</a></p>
                        </div>
                    </form>
                </div>
    
            </div>
        </div>

        <script>
            let subMenu = document.getElementById("subMenu");

            function toggleMenu() {
                subMenu.classList.toggle("open-menu");
            }

        </script>
        
        <script src="login.js"></script>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </body>
</html>