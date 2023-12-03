<?php

class Logout
{
    public function __construct()
    {
        session_start(); // Start the session (if not already started)

        // Unset all session variables
        $_SESSION = array();

        // If you want to destroy the session cookie, uncomment the following line
        // setcookie(session_name(), '', time() - 3600, '/');

        // Finally, destroy the session
        session_destroy();

        header("Location: Login.php");
        
        exit();
    }
}

new Logout();
?>
