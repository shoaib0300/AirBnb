<?php 
    include 'HeaderFooter/Header.php';
    include 'rooms/CreateRoom.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {


        $date = new  Room();
        $from_date = $date->getDate($_POST['from-date']);
        $to_date = $date->getDate($_POST['to-date']);

        $formParams = [
            'owner_id' => $_SESSION['user'],
            'Rnumber' => $_POST['Rnumber'],
            'Rprice' => $_POST['Rprice'],
            'Rlocation' => $_POST['Rlocation'],
            'guests' => $_POST['guests'],
            'ravailabel' => $_POST['ravailabel'],
            'from-date' => $from_date,
            'to-date' => $to_date,
        ];
        $createroom = new Room();
        $createroom->createRoom($formParams);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
    <div class="container">
        <div class="create-property-form">
            <h2 id="create-property-form">Create Property Form</h2>
            <form action="" method="post">
                <label for="Rnumber">Room Number in Your Buiding: </label>
                <input type="text" class="form-control" name="Rnumber" id="roomnumber" maxlength="10" required><br>
                <label for="Rprice">Roon Price: </label>
                <input type="text" class="form-control" name="Rprice" id="rprice" required><br>
                <label for="Rlocation">Room Location: </label>
                <input type="text" class="form-control" name="Rlocation" id="rlocation" required><br>
                <label for="guests">Total number of Guests: </label>
                <input type="text" class="form-control" name="guests" id="guests" maxlength="2" required><br>
                <label for="ravailabel">Room Available Yes Or No: </label>
                <input type="text" class="form-control" name="ravailabel" id="ravailabel" required><br>
                <label for="from-date">Available From: </label>
                <input type="date" class="form-control" name="from-date" id="room-from-date" required><br>
                <label for="to-date">Available to: </label>
                <input type="date" class="form-control" name="to-date" id="room-from-to" required><br>
                <input type="submit" class="btn btn-primary" name="submit" value="Submit">  
                <a href="Login.php" class="btn btn-light">Login</a>
                <a href="index.php" class="btn btn-default">Back</a>
            </form>
        </div>
    </div> 
</body>
</html>