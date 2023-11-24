<?php 
    require Database;
    if(!isset($db)){
        $instance = Connection::getInstance();
        $db = $instance->getConnection();
    }

    if(isset($_POST["submit"]));{
        $username = $_POST["username"];
        $email = $_POST["username"];
        $password = $_POST["username"];
        $country = $_POST["username"];
        $phone = $_POST["username"];

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
        <input type="text" name="name" id="username"><br>
        <label for="email">Email: </label>
        <input type="text" name="email" id="useremail"><br>
        <label for="password">Password: </label>
        <input type="text" name="password" id="password"><br>
        <label for="confirm-password">Confirm Password: </label>
        <input type="text" name="confirm-password" id="confirm-password"><br>
        <label for="country">Country: </label>
        <input type="text" name="country" id="country"><br>
        <label for="phone">Phone Number: </label>
        <input type="text" name="phone" id="phone">
    </form>
</body>
</html>