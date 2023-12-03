<?php
namespace App\Users;
use App\Database\Database;
use PDO;
class UserProfile{
    private $db;
    public function __construct(){
        $instance = Database::getInstance();
        $this->db = $instance->getConnection();
    }
    public function getUserData($id){
        $sql = "SELECT * FROM users WHERE id=$id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user;
    }
    public function userUpdate($data){
        $sql = "UPDATE users SET username=?, email=?, password=?, country=?, phone=? WHERE id=?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(
            [
                $data['username'],
                $data['email'],
                $data['password'],
                $data['country'],
                $data['phone'],
                $data['user_id']
            ]
        );
        header("Location: ../../index.php");
        exit();
    }
    

}