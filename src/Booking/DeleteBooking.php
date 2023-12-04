<?php 
namespace App\Booking;
use App\Database\Database;
use PDO;

class DeleteBooking{
    private $db;

    public function __construct(){
        $instance = Database::getInstance();
        $this->db = $instance->getConnection();
    }

    public function deleteBooking($id){
        $sql = "DELETE FROM bookings WHERE booking_id=?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        header("Location: ../../index.php");  
        exit();
    }
}

?>