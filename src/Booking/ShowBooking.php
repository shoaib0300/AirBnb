<?php 
namespace App\Booking;
use App\Database\Database;
use PDO;

class ShowBooking{
    private $db;

    public function __construct(){
        $instance = Database::getInstance();
        $this->db = $instance->getConnection();
    }

    public function getAllBookings(){
        $id = $_SESSION['user'];
        $sql = "SELECT * FROM bookings WHERE book_user_id = $id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $rooms = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rooms;
    }
}

?>