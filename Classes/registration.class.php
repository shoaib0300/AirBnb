<?php 

require 'Database.php';

class Registration{
    private $db; 
    public function __construct(){
        $instance = Database::getInstance();
        $this->db = $instance->getConnection();
    }
    public function processRegistration($username, $email, $password, $cpassword, $country, $phone){
        if ($password === $cpassword) {
            $this->saveToDatabase($username, $email, $password, $country, $phone);
        }
        else{
            echo "Password is Wrong";
        }
    }

    public function saveToDatabase($username, $email, $password, $country, $phone){
        global $db;
        $sql = "INSERT INTO users (username, email, password, country, phone) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$username, $email, $password, $country, $phone]);
        header("Location: index.php");
    }
}