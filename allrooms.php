<?php
    include 'rooms/CreateRoom.php';

    echo '<a href="index.php">Home</a>'.'<br>';
    echo '<a href="Login.php">Login</a>'. '<br>';
    echo '<a href="Registration.php">Registration</a>'. '<br>';
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
        echo '<p style="font-size: 12px;">Post id: ' . $room['room_id'] . '</p>';
        echo '<h4>Room Number: ' . $room['room_number'] . '</h4>';
        echo '<p>Price: ' . $room['room_price'] . '</p>';
        echo '<p>Location: ' . $room['location'] . '</p>';
        echo '<p>Guests: ' . $room['number_of_guests'] . '</p>';
        echo '<p>Available: ' . $room['available'] . '</p>';
        echo '<p>Available From: ' . $room['available_from'] . '</p>';
        echo '<p>Available To: ' . $room['available_to'] . '</p>';
        echo '<form method="post">';
        echo '<input type="hidden" name="room_id" value="' . $room['room_id'] . '">';
        echo '<button type="submit" class="btn btn-default" name="edit" value="edit">Edit</button>';
        echo '<button type="submit" class="btn btn-danger" name="delete" value="Delete">Delete</button>';
        echo '</form>';
        echo '</div>';
        echo '<br>';
    }
    echo '</div>';
    ?>
</body>
</html>
