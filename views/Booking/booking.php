<?php
include_once '../../HeaderFooter/Header.php';
require_once __DIR__ . '/../../vendor/autoload.php';
use App\Booking\Booking;
use App\Rooms\Room;

    if(isset($_GET['id'])){
        $room_id = $_GET['id'];
        $room = new Room();
        $room_deatil = $room->getSingleRoom($room_id);
        
        if(!empty($room_deatil)){
            $room_id = $room_deatil[0]['room_id'];
            $owner_id = $room_deatil[0]['owner_id'];
            $room_number = $room_deatil[0]['room_number'];
            $price = $room_deatil[0]['price'];
            $location = $room_deatil[0]['location'];
            $number_of_guests = $room_deatil[0]['number_of_guests'];
            $available = $room_deatil[0]['available'];
            $book_from = $room_deatil[0]['available_from'];
            $book_to = $room_deatil[0]['available_to'];
            $book_from = date('Y-m-d', strtotime($room_deatil[0]['available_from']));
            $book_to = date('Y-m-d', strtotime($room_deatil[0]['available_to']));
        }else{
            echo "Room Not Found";
        }
    };

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $data = [
            'book_user_id' => $_SESSION['user'],
            'owner_id' => $_POST['owner_id'],
            'room_id' => $_POST['room_id'],
            'room_booking' => $_POST['Rnumber'],
            'price' => $_POST['Rprice'],
            'location' => $_POST['Rlocation'],
            'number_of_guests' => $_POST['guests'],
            'check_in' => $_POST['from-date'],
            'check_out' => $_POST['to-date']
        ];
        $book_room = new Booking();
        $book_room->createBooking($data);
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book You Room</title>
</head>
<body>
<div class="container">
        <div class="create-property-form">
            <h2 id="create-property-form">Book Your New Dream Room</h2>
            <h3 id="create-property-form">Want to See you room first? No Problem Here<br> <a href="zoom-meeting">Book an Online Appoinment</a> </h3>
            <p class="header-of-form"><b>Room ID: </b> <?= $room_id; ?></p>
            <form action="" type="submit" method="POST">
                <input type="hidden" class="form-control" name="room_id" id="room_id" value="<?= $room_id;?>"><br>
                <input type="hidden" class="form-control" name="owner_id" id="owner_id" value="<?= $owner_id;?>"><br>
                <label for="Rnumber">Room Number in Buiding: </label>
                <input type="text" class="form-control" name="Rnumber" id="roomnumber" value="<?= $room_number;?>" maxlength="10" readonly><br>
                <label for="Rprice">Room Price: </label>
                <input type="text" class="form-control" name="Rprice" id="rprice" value="<?= $price;?>" readonly><br>
                <label for="Rlocation">Room Location: </label>
                <input type="text" class="form-control" name="Rlocation" id="rlocation" value="<?= $location;?>"  readonly><br>
                <label for="guests">Total number of Guests: </label>
                <input type="text" class="form-control" name="guests" id="guests" maxlength="2" value="<?= $number_of_guests;?>"  required><br> 
                <label for="from-date">Available From: </label>
                <input type="date" class="form-control" name="from-date" id="room-from-date" value="<?= $book_from;?>"  required><br>
                <label for="to-date">Available to: </label>
                <input type="date" class="form-control" name="to-date" id="room-from-to" value="<?= $book_to;?>"  required><br>
                <input type="submit" class="btn btn-primary" name="submit" value="Book Now">  
            </form>
        </div>
    </div> 
</body>
</html>