<?php 
    require_once 'Classes/login.class.php';
    include 'HeaderFooter/Header.php';
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
    <div class="container">
        <div class="login-form">
            <h2 id="Login">Login</h2>
            <form action="" type="submit" method="post">
                <label for="email">Email: </label>
                <input type="text"  class="form-control" name="email" id="useremail"><br>
                <label for="password">Password: </label>
                <input type="text"  class="form-control" name="password" id="password"><br>
                <input type="submit" class="btn btn-primary" name="submit" value="Submit">  
                <a href="Registration.php" class="btn btn-light">Sign Up</a>
                <a href="index.php" class="btn btn-default">Back</a>
            </form>
        </div>    
    </div>
</body>
</html>