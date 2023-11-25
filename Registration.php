<?php 
    require_once 'Classes/registration.class.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $registration = new Registration();
        $registration->processRegistration($_POST['name'], $_POST['email'], $_POST['password'],
                                $_POST['confirm-password'], $_POST['country'], $_POST['phone']);
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rigistration</title>
</head>
<body>
    <h2 id="registration">Registration Page</h2>
    <form action="" type="submit" method="post">
        <label for="name">Name: </label>
        <input type="text" name="name" id="username" require><br>
        <label for="email">Email: </label>
        <input type="text" name="email" id="useremail" required><br>
        <label for="password">Password: </label>
        <input type="text" name="password" id="password" required><br>
        <label for="confirm-password">Confirm Password: </label>
        <input type="text" name="confirm-password" id="confirm-password" required><br>
        <label for="country">Country: </label>
        <input type="text" name="country" id="country" required><br>
        <label for="phone">Phone Number: </label>
        <input type="text" name="phone" id="phone" required><br>
        <input type="submit" name="submit" value="Submit">  
        <a href="Login.php">Login</a>
        <a href="index.php">Back</a>

    </form>
</body>
</html>