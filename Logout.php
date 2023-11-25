<?php
require 'Classes/Session.php';

class Logout
{
    public function __construct()
    {
        Session::destroySession();
        header("Location: Login.php");
        exit();
    }
}

new Logout();
?>
