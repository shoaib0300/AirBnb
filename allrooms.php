<?php
    include 'rooms/CreateRoom.php';
    include 'HeaderFooter/Header.php';
    $data = new Room();
    $getrooms = $data->getRoomsFromDB();  
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['delete'])) {
            $id = $_POST['room_id'];
            $delete = new Room();
            $delete->deleteRoom($id);
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
        .single-card {
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
    <title>Document</title>
</head>
<body>
    <?php 
    echo '<div class="single-card">';
    foreach ($getrooms as $room) {
        echo '<div class="card" style="width: 340px;">';
        echo '<form method="post">';
        echo '<input type="hidden" name="room_id" value="' . $room['room_id'] . '">';
        echo '<p style="font-size: 12px;">Post id: ' . $room['room_id'] .'&emsp; &emsp;';
        if (isset($_SESSION['user']) && ($_SESSION['user'] == $room['owner_id'])) {
            echo '<a href="room-edit.php?id=' . $room['room_id'] . '" name="edit" value="Edit" class="btn btn-link">Edit</a>' .
                '<a type="submit" class="btn btn-link" name="delete" value="Delete" style="color: red;">Delete</a>';
        }
        echo '</p>';
        echo '</form>';           
        echo '<h4>Room Number: ' . $room['room_number'] . '</h4>';
        echo '<p>Price: ' . $room['room_price'] . '</p>';
        echo '<p>Location: ' . $room['location'] . '</p>';
        echo '<p>Guests: ' . $room['number_of_guests'] . '</p>';
        echo '<p>Available: ' . $room['available'] . '</p>';
        echo '<p>Available From: ' . date('Y-m-d', strtotime($room['available_from'])) . '</p>';
        echo '<p>Available To: ' . date('Y-m-d', strtotime($room['available_to'])) . '</p>';
        echo '</div>';
        echo '<br>';
    }
    echo '</div>';
    ?>
</body>
</html>
