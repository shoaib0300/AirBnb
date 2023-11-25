<?php
    require 'Classes/Database.php';
    require 'Classes/Session.php';
    Session::sessiosStart();
    
    $instance = Database::getInstance();
    $db = $instance->getConnection();

    if(isset($_SESSION['user'])){
        $id = $_SESSION['user'];
        $sql = "SELECT * FROM users WHERE id = $id"; 
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $user = $stmt->fetch();
        $_SESSION['username'] = $user['username'];
    }
    else{
        header("Location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Duplicate Airbnb</title>
</head>
<body>
    <h2>Hello World <u><?php echo $_SESSION["username"]; ?></u></h2>
    <a href="Logout.php">Log Out</a>
    <script src="assets/script.js" ></script>
</body>
</html>
