<?php
     include_once '../../HeaderFooter/Header.php';
     require_once __DIR__ . '/../../vendor/autoload.php';
     use App\Rooms\Room;
     if($_SESSION['user']){
        $user_id = $_SESSION['user'];
     }
        $room = new Room();
        // get all current users rooms
        $getrooms = $room->getMyRoomsFromDB($user_id);
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            if (isset($_POST['delete'])) {
                $id = $_POST['room_id'];
                $delete = new Room();
                $delete->deleteRoom($id);
            }
        }

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Rooms</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 id="my-rooms">My Rooms</h2>
            </div>
            <?php foreach ($getrooms as $room) { ?>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <p>Room Number: <?= $room['room_number']; ?></p>
                            <p>Room Price: <?= $room['room_price']; ?></p>
                            <p>Room Location: <?= $room['location']; ?></p>
                            <p>Number of Guests: <?= $room['number_of_guests']; ?></p>
                            <p>Room Available: <?= $room['available']; ?></p>
                            <p>Available From: <?= date('d-m-Y', strtotime($room['available_from'])); ?></p>
                            <p>Available To: <?= date('d-m-Y', strtotime($room['available_to'])); ?></p>
                            <form action="" method="post">
                                <input type="hidden" name="room_id" value="<?= $room['room_id']; ?>">
                                <input type="submit" name="delete" value="Delete" class="btn btn-danger">
                                <a href="room-edit.php?id=<?= $room['room_id']; ?>" class="btn btn-primary">Edit</a>
                            </form>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

</body>
</html>