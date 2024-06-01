
<link rel="stylesheet" href="../assets/header.css">
<nav>
    <a class="logo" href="index.php">Fames</a>
    <form>
        <div class="search">
            <span class="search-icon material-symbols-outlined">search</span>
            <input class="search-input" type="search" placeholder="Search">
        </div>
    </form>
    <?php 
    if(isset($_SESSION["User"]))    echo'
    <ul style="text-align: left;">
    
        <li><a href="#">My collection</a></li>
    </ul>';
    ?>
    <ul style="text-align: right;">

        <li><a href="#">About us</a></li>
        <li><a href="#">Support</a></li>
    </ul>

    <img src="../../public/user.png" class="user-pic" onclick="toggleMenu()">

    <div class="sub-menu-wrap" id="subMenu">
        <div class="sub-menu">
            <div class="user-info">
                <a href="login.html" class="sub-menu-link"></a>
                <img src="../../public/user.png">
                <h3>
                    <?php
                    if (isset($_SESSION["User"])) {
                        echo $_SESSION["User"]->getUsername();
                    } else
                        echo "Please log in";
                    ?>
                </h3>
            </div>
            <hr>
            <?php
            if (isset($_SESSION["User"])) {
                echo '<a href="#" class="sub-menu-link">
                <img src="../../public/settings.png">
                <p>Settings</p>
            </a>    
            <a href="../features/logout_ifs.php" class="sub-menu-link">
                <img src="../../public/logout.png">
                <p>Logout</p>
            </a>';
            if($_SESSION['User'] -> getPermission()==0) {
                echo '<hr><a href="../CRUD/admin_panel.php" class="sub-menu-link">
                <p>Admin panel :)</p>
            </a>';
            }
            } else
                echo '<a href="login.php" class="sub-menu-link">
                <img src="../../public/logout.png">
            <p>Log in</p>
            </a>';
            ?>

        </div>
    </div>

</nav>