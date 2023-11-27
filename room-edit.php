<?php
include 'HeaderFooter/Header.php';
include 'rooms/CreateRoom.php';

if (isset($_GET['id'])) {
    $room_id = $_GET['id'];
    $room = new Room();
    $room_data = $room->getSingleRoom($room_id);
    // print_r($room_data[0]['available_from']);exit;
    if (!empty($room_data)) {
        $room_id = $room_data[0]['room_id'];
        $owner_id = $room_data[0]['owner_id'];
        $room_number = $room_data[0]['room_number'];
        $price = $room_data[0]['price'];
        $location = $room_data[0]['location'];
        $number_of_guests = $room_data[0]['number_of_guests'];
        $available = $room_data[0]['available'];
        $available_from = $room_data[0]['available_from'];
        $available_to = $room_data[0]['available_to'];
        $available_from = date('Y-m-d', strtotime($room_data[0]['available_from']));
        $available_to = date('Y-m-d', strtotime($room_data[0]['available_to']));
    } else {
        echo "Room not found";
    }
} else {
    echo "Room ID not provided";
}
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $data = [
        'room_number' => $_POST['Rnumber'],
        'price' => $_POST['Rprice'],
        'location' => $_POST['Rlocation'],  
        'number_of_guests' => $_POST['guests'], 
        'available' => $_POST['ravailabel'], 
        'available_from' => $_POST['from-date'],
        'available_to' => $_POST['to-date'],
        'room_id' => $_POST['room_id']
    ];
    $update = new Room();
    $update->updateRoom($data);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit the Room <?= $room_id; ?></title>
</head>
<body>
    <div class="container">
        <div class="create-property-form">
            <h2 id="create-property-form">Edit and Update Property Form </h2>
            <p class="header-of-form"><b>Room ID: </b> <?= $room_id; ?> <b>Owner ID: </b> <?= $owner_id; ?></p>
            <form action="" type="submit" method="POST">
                <input type="hidden" class="form-control" name="room_id" id="room_id" value="<?= $room_id;?>"><br>
                <label for="Rnumber">Room Number in Your Buiding: </label>
                <input type="text" class="form-control" name="Rnumber" id="roomnumber" value="<?= $room_number;?>" maxlength="10" required><br>
                <label for="Rprice">Room Price: </label>
                <input type="text" class="form-control" name="Rprice" id="rprice" value="<?= $price;?>" required><br>
                <label for="Rlocation">Room Location: </label>
                <input type="text" class="form-control" name="Rlocation" id="rlocation" value="<?= $location;?>"  required><br>
                <label for="guests">Total number of Guests: </label>
                <input type="text" class="form-control" name="guests" id="guests" maxlength="2" value="<?= $number_of_guests;?>"  required><br>
                <label for="ravailabel">Room Available Yes Or No: </label>
                <input type="text" class="form-control" name="ravailabel" id="ravailabel" value="<?= $available;?>"  required><br>
                <label for="from-date">Available From: </label>
                <input type="date" class="form-control" name="from-date" id="room-from-date" value="<?= $available_from;?>"  required><br>
                <label for="to-date">Available to: </label>
                <input type="date" class="form-control" name="to-date" id="room-from-to" value="<?= $available_to;?>"  required><br>
                <input type="submit" class="btn btn-primary" name="submit" value="Update">  
            </form>
        </div>
    </div> 
</body>
</html>
