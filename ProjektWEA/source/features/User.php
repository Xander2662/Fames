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

    private function fetchFeedItems()
    {

    }

    public function addFeedItem($item)
    {

    }

    public function removeFeedItem($itemId)
    {

    }

    public function displayFeed()
    {

    }
}
?>