<?php
include_once '../../HeaderFooter/Header.php';
require_once __DIR__ . '/../../vendor/autoload.php';
use App\Booking\ShowBooking;
use App\Booking\DeleteBooking;

$data = new ShowBooking();
$bookings = $data->getAllBookings();

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if (isset($_POST['delete'])) {
        $id = $_POST['booking_id'];
        $delete = new DeleteBooking();
        $delete->deleteBooking($id);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>
        .booking-card {
            display: flex;
            flex-wrap: wrap;
            padding: 30px;
        }
        .card{
            margin: 10px;
            padding: 20px;
            background-color: whitesmoke;
            border: 2px solid beige;
        }
    </style>
    <title>All Bookings</title>
</head>
<body>
    <div class="container">
        <h2>All Bookings</h2>
        <div class="booking-card">
            <?php foreach ($bookings as $booking): ?>
                <div class="card" style="width: 340px;">
                    <form method="post">
                        <h4 name="booking_id" value="<?php echo $booking['booking_id']; ?>">Booking ID: <?php echo $booking['booking_id']; ?></h4>
                        <p>Room Number: <?php echo $booking['room_number']; ?></p>
                        <p>Location: <?php echo $booking['location']; ?></p>
                        <p >Check-in Date: <?php echo date('Y-m-d', strtotime($booking['check_in'])); ?></p>
                        <p>Check-out Date: <?php echo date('Y-m-d', strtotime($booking['check_out'])); ?></p>
                        <!-- Add more details as needed -->
                        
                        <!-- Note: Use hidden input for passing the booking_id to the server -->
                        <input type="hidden" name="booking_id" value="<?php echo $booking['booking_id']; ?>">
                        <button type="submit" class="btn btn-danger" name="delete" value="Cancel">Cancel Booking</button>
                        <a href="view-booking.php?id=<?php echo $booking['booking_id']; ?>" name="view" class="btn btn-primary">View Booking</a>
                    </form>

                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
