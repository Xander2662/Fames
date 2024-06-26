<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css">
<script>
    $(function () {
        var availablesearch = [
            <?php
            include "../features/getGames.php";
            foreach ($name as $x) {
                echo "\"$x\",";
            }
            ?>        
];
    $( "#search" ).autocomplete({
      source: availablesearch
    });
  } );
  </script>
<link rel="stylesheet" href="../assets/header.css">
<nav>
    <a class="logo" href="index.php">Fames</a>
    <form>
        <div class="search">
            <span class="search-icon material-symbols-outlined">search</span>
            <input class="search-input" type="search" id="search" placeholder="Search">
        </div>
    </form>
    <?php
    if (isset($_SESSION["User"]))
        echo '<ul style="text-align: left;">
        <li><a href="myCollection.php">My collection</a></li>
    </ul>'; 
    ?>
    <ul style="text-align: right;">

        <li><a href="aboutUs.php">About us</a></li>
        <li><a href="support.php">Support</a></li>
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
                echo '<a href="../features/logout_ifs.php" class="sub-menu-link">
                <img src="../../public/logout.png">
                <p>Logout</p>
            </a>';
                if ($_SESSION['User']->getPermission() == 0) {
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
<script>
    $(document).ready(function(){
$(".card").dblclick(function(){
  console.log(this.id);
  this.children[1].classList.toggle("liked");
  if(this.children[1].classList.contains("liked"))this.children[1].children[0].textContent=parseInt(this.children[1].children[0].textContent)+1;
  else this.children[1].children[0].textContent=parseInt(this.children[1].children[0].textContent)-1;
});
    })

</script>