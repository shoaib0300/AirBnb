<?php 
    require_once 'Classes/registration.class.php';
    require 'HeaderFooter/Header.php';

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
    <title>Registration</title>
</head>
<body>
    <div class="container">
        <div class="registration-form">
            <h2 id="registration">Registration</h2>
            <form action="" type="submit" method="post">
                <label for="name">Name: </label>
                <input type="text" class="form-control" name="name" id="username" require><br>
                <label for="email">Email: </label>
                <input type="text" class="form-control" name="email" id="useremail" required><br>
                <label for="password">Password: </label>
                <input type="text" class="form-control" name="password" id="password" required><br>
                <label for="confirm-password">Confirm Password: </label>
                <input type="text" class="form-control" name="confirm-password" id="confirm-password" required><br>
                <label for="country">Country: </label>
                <input type="text" class="form-control" name="country" id="country" required><br>
                <label for="phone">Phone Number: </label>
                <input type="number" class="form-control" name="phone" id="phone" required><br>
                <input type="submit" class="btn btn-primary" name="submit" value="Sign Up">  
                <a href="Login.php" class="btn btn-light">Already a member?</a>
                <a href="index.php" class="btn btn-default">Back</a>
            </form>
        </div>
    </div>    
</body>
</html>