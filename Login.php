<?php 
    require_once 'Classes/login.class.php';
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(empty($_POST["email"]) || empty($_POST["password"])){
            echo "<label>All Fields are required</label>";
        }  
        else{
            $login = new Login();
            $login->loginProcess($_POST['email'],$_POST['password']);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2 id="Login">Login Page</h2>
    <form action="" type="submit" method="post">
        <label for="email">Email: </label>
        <input type="text" name="email" id="useremail"><br>
        <label for="password">Password: </label>
        <input type="text" name="password" id="password"><br>
        <input type="submit" name="submit" value="Submit">  
        <a href="Registration.php">Sign Up</a>
        <a href="index.php">Back</a>
    </form>
</body>
</html>