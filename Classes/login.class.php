<?php
require 'Database.php';
class Login
{
    private $db;
    public function __construct()
    {
        $instance = Database::getInstance();
        $this->db = $instance->getConnection();
    }
    public function loginProcess($email, $password)
    {
        $this->sendDataToDB($email, $password);
    }
    public function sendDataToDB($email, $password)
    {
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($password == $user['password']){
            Session::setSession('user',$user['id']);
            Session::setSession('email',$user['email']);
            Session::setSession('name',$user['name']);            
            Session::setSession('Login', true);
            header("Location: index.php");
        } else {
            echo "Email OR Password is Wrong";
        }
    }
}
