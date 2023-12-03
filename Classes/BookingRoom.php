<?php 

require_once 'Database.php';
class Booking{
    private $db;
    public function __construct(){
        $instance = Database::getInstance();
        $this->db = $instance->getConnection();
    }

    public function createBooking($data){
        $sql = "INSERT INTO bookings (book_user_id, owner_id, room_id, room_number, location, number_of_guests, check_in, check_out, price, total_price)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            $data['book_user_id'],
            $data['owner_id'],
            $data['room_id'],
            $data['room_booking'],
            $data['location'],
            $data['number_of_guests'],
            $data['check_in'],
            $data['check_out'],
            $data['price'],
            $data['price'],
        ]);
    
        // Perform the redirection first
        header("Location: index.php");
        exit();
    }
    
}