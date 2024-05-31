<link rel="stylesheet" href="../assets/header.css">
<nav>
    <a class="logo" href="index.php">Fames</a>
    <form>
        <div class="search">
            <span class="search-icon material-symbols-outlined">search</span>
            <input class="search-input" type="search" placeholder="Search">
        </div>
    </form>
    <ul style="text-align: left;">
        <li><a href="#">Games</a></li>
    </ul>
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
                <h3>Jmeno</h3>
            </div>
            <hr>

            <a href="#" class="sub-menu-link">
                <img src="../../public/settings.png">
                <p>Settings</p>
            </a>
            <a href="#" class="sub-menu-link">
                <img src="../../public/logout.png">
                <p>Logout</p>
            </a>

        </div>
    </div>

</nav>