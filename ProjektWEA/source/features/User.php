<?php
// tohle php bude dané do každé page, do každé featury kde bude fungovat sql potřebné k individualnímu userovi, zde jsou potřebné funkce pro session validaci a obecně všechny věci okolo usera
class User
{
    private $userId;
    private $username;
    private $permission;
    private $feedItems;

    // Constructor
    public function __construct($idusers, $username, $permission)
    {
        $this->validateSession();
        $this->userId = $idusers;
        $this->username = $username;
        $this->permission = $permission;
    }

    // Getter for username
public function getUsername() {
    return $this->username;
}

// Getter for userId
public function getUserId() {
    return $this->userId;
}

// Getter for permission
public function getPermission() {
    return $this->permission;
}

    // Method to validate user session
    private function validateSession()
    {
        session_start();
        if (!isset($_SESSION['Logged']) || $_SESSION['Logged'] !== true) {
            header("Location: ../commons/login.php");
            exit();
        }
    }

    // Method to fetch feed items from the database
    private function fetchFeedItems()
    {
        // Example: Database connection and query to fetch feed items
        // Replace this with your actual database logic
        $feedItems = [
            ['id' => 1, 'name' => 'First Feed Item'],
            ['id' => 2, 'name' => 'Second Feed Item']
        ];
        return $feedItems;
    }

    // Method to add a feed item
    public function addFeedItem($item)
    {
        // Add the item to the feed and update the database
        $this->feedItems[] = $item;
        // Database update code
    }

    // Method to remove a feed item
    public function removeFeedItem($itemId)
    {
        // Remove the item from the feed and update the database
        foreach ($this->feedItems as $key => $item) {
            if ($item['id'] == $itemId) {
                unset($this->feedItems[$key]);
                // Database update code
                break;
            }
        }
    }

    // Method to display the feed based on permissions
    public function displayFeed()
    {
        // Check permissions and render the feed
        if ($this->permission == 'admin' || $this->permission == 'user') {
            foreach ($this->feedItems as $item) {
                echo $item['name'] . '<br>'; // Example of displaying item names
            }
        } else {
            echo "You do not have permission to view this feed.";
        }
    }
}
?>