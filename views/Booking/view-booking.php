<?php 
include_once '../../HeaderFooter/Header.php';
require_once __DIR__ . '/../../vendor/autoload.php';
use App\Booking\ShowBooking;
use App\Booking\DeleteBooking;

$id = $_SESSION['user'];
$get_rooms = new ShowBooking();
$room_data = $get_rooms->getAllBookings();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
    <div class="create-property-form">
        <h2 id="create-property-form">Book Your New Dream Room</h2>
        <h3 id="create-property-form">Want to See you room first? No Problem Here<br> <a href="zoom-meeting">Book an Online Appoinment</a> </h3>
        <p class="header-of-form"><b>Room ID: </b> <?= $room_data[0]['room_id']; ?></p>
        <form action="" type="submit" method="POST">
            <input type="hidden" class="form-control" name="room_id" id="room_id" value="<?= $room_data[0]['booking_id'];?>"><br>
            <label for="Rnumber">Room Number in Buiding: </label>
            <input type="text" class="form-control" name="Rnumber" id="roomnumber" value="<?= $room_data[0]['room_number'];?>" maxlength="10" readonly><br>
            <label for="Rprice">Room Price: </label>
            <input type="text" class="form-control" name="Rprice" id="rprice" value="<?= $room_data[0]['price'];?>" readonly><br>
            <label for="total_price">Room Price: </label>
            <input type="text" class="form-control" name="total_price" id="total_price" value="<?= $room_data[0]['total_price'];?>" readonly><br>
            <label for="Rlocation">Room Location: </label>
            <input type="text" class="form-control" name="Rlocation" id="rlocation" value="<?= $room_data[0]['location'];?>"  readonly><br>
            <label for="guests">Total number of Guests: </label>
            <input type="text" class="form-control" name="guests" id="guests" maxlength="2" value="<?= $room_data[0]['number_of_guests'];?>"  readonly><br>
            <label for="from-date">Available From: </label>
            <input type="date" class="form-control" name="from-date" id="room-from-date" value="<?= date('Y-m-d', strtotime($room_data[0]['check_in']));?>" min="<?php echo date('Y-m-d'); ?>" required><br>
            <label for="to-date">Available to: </label>
            <input type="date" class="form-control" name="to-date" id="room-from-to" value="<?= date('Y-m-d', strtotime($room_data[0]['check_out']));?>" min="<?php echo date('Y-m-d'); ?>" required><br>
            <input type="submit" class="btn btn-primary" name="submit" value="Update Booking">  
        </form>
    </div>
    </div>
    <script>
    document.getElementById('room-from-date').addEventListener('change', function () {
        var fromDate = new Date(this.value);
        var toDateInput = document.getElementById('room-from-to');
        var toDate = new Date(toDateInput.value);

        if (fromDate > toDate) {
            alert('Checkout date must be larger than check-in date');
            toDateInput.value = this.value;
        }
    });

    document.getElementById('room-from-to').addEventListener('change', function () {
        var toDate = new Date(this.value);
        var fromDateInput = document.getElementById('room-from-date');
        var fromDate = new Date(fromDateInput.value);

        if (toDate < fromDate) {
            alert('Checkout date must be larger than check-in date');
            this.value = fromDateInput.value;
        }
    });
</script>
</body>
</html>