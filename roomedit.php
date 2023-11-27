<?php
    include 'rooms/CreateRoom.php';

    echo '<a href="index.php">Home</a>'.'<br>';
    echo '<a href="Login.php">Login</a>'. '<br>';
    echo '<a href="Registration.php">Registration</a>'. '<br>';
    $data = new Room();
    $getrooms = $data->getRoomsFromDB();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['edit'])) {
            $id = $_POST['room_id'];
            // Fetch the room details for editing
            $roomToEdit = $data->getRoomById($id);
            // Display the edit form
            displayEditForm($roomToEdit);
        } elseif (isset($_POST['update'])) {
            // Handle the form submission for updating room details
            $id = $_POST['room_id'];
            $updatedData = array(
                'room_number' => $_POST['room_number'],
                'room_price' => $_POST['room_price'],
                // Add other fields as needed
            );
            $data->updateRoom($id, $updatedData);
            // Redirect or display a success message
            header("Location: index.php");
        }
    }

    function displayEditForm($room) {
        echo '<form method="post">';
        echo '<input type="hidden" name="room_id" value="' . $room['room_id'] . '">';
        echo 'Room Number: <input type="text" name="room_number" value="' . $room['room_number'] . '"><br>';
        echo 'Room Price: <input type="text" name="room_price" value="' . $room['room_price'] . '"><br>';
        // Add other form fields as needed
        echo '<button type="submit" class="btn btn-primary" name="update" value="Update">Update</button>';
        echo '</form>';
    }
?>
