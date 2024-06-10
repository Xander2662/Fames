<?php
// tohle php bude dané do každé page, do každé featury kde bude fungovat sql potřebné k individualnímu userovi, zde jsou potřebné funkce pro session validaci a obecně všechny věci okolo usera
class User
{
    private $userId;
    private $username;
    private $permission;
    private $feedItems;

    // Constructor
    public function __construct($idUsers, $username, $permission)
    {
        $this->validateSession();
        $this->userId = $idUsers;
        $this->username = $username;
        $this->permission = $permission;
        $this->feedItems = [];
        $this->fetchFeedItems();
    }

    // Getter for username
    public function getUsername()
    {
        return $this->username;
    }

    // Getter for userId
    public function getUserId()
    {
        return $this->userId;
    }

    // Getter for permission
    public function getPermission()
    {
        return $this->permission;
    }

    // Method to validate user session
    private function validateSession()
    {
        if (!isset($_SESSION['Logged']) || $_SESSION['Logged'] !== true) {
            header("Location: ../commons/login.php");
            exit();
        }
    }

    // Method to fetch feed items from the database
    private function fetchFeedItems()
    {
        $db_site = "mysql-e00995a82b810debc80b8fe8b224ea51.alwaysdata.net";
        $db_user = "363131";
        $db_password = "On74865288362";
        $db_name = "e00995a82b810debc80b8fe8b224ea51_fashion_in_games";

        $con = mysqli_connect($db_site, $db_user, $db_password, $db_name);

        $sql = "SELECT p.sumlikes,p.idPost,p.text,p.popis, g.name as gameName, g.color as gameColor FROM Post p inner join Games g on p.Games_idGames = g.idGames WHERE Users_idusers = '$this->userId'";
        $result = mysqli_query($con, $sql);

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo mysqli_fetch_assoc($result);
                $this->feedItems[] = $row;
            }
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }

    public function addFeedItem($item)
    {
        
    }

    public function removeFeedItem($itemId)
    {

    }

    public function displayFeed()
    {
        foreach ($this->feedItems as $item) {
            $likes = $item['sumlikes'];
            $id = $item['idPost'];
            $user = $this->username;  // Assuming the username is part of the User object
            $gameName = $item['gameName'];
            $title = $item['text'];
            $popis = $item['popis'];
            $color = $item['gameColor'];

            // Exploding color and ensuring it has at least two elements
            $colors = explode("R", $color);
            if (count($colors) >= 2) {
                list($bgColor, $borderColor) = $colors;
            } else {
                // Default colors if the explode didn't work as expected
                $bgColor = "255,255,255"; // Default white background
                $borderColor = "0,0,0";   // Default black border
            }

            echo "<div class='card' id='c" . $id . "' style='background-color:rgb(" . $bgColor . ");border-color:rgb(" . $borderColor . ");'>";
            echo "<div class='title' style='border-color:rgb(" . $borderColor . ");'>" . $title . "</div>";
            echo "<div class='like' style='border-color:rgb(" . $borderColor . ");'><p>" . $likes . "</p></div>";
            echo "<div class='gem' style='border-color:rgb(" . $borderColor . ");'></div>";
            echo "<img class='picture' style='border-color:rgb(" . $borderColor . ");' src='../../public/usrimg/" . $id . ".jpeg'>";
            echo "<div class='text' style='border-color:rgb(" . $borderColor . ");'>" . $popis . "</div>";
            echo "<p class='iden1'>Cardset: " . $gameName . "</p>";
            echo "<p class='iden2'>user: " . $user . "</p>";
            echo "</div>";
        }
    }
}
?>