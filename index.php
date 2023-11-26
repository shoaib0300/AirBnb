<?php
    include 'HeaderFooter/Header.php';
    require 'Classes/Database.php';
    
    $instance = Database::getInstance();
    $db = $instance->getConnection();

    if(isset($_SESSION['user'])){
        $id = $_SESSION['user'];
        $sql = "SELECT * FROM users WHERE id = $id"; 
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $user = $stmt->fetch();
        $_SESSION['username'] = $user['username'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['country'] = $user['country'];
        $_SESSION['phone'] = $user['phone'];

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Duplicate Airbnb</title>
</head>
<body>
    <h2>Hello World </h2>
    <script src="assets/script.js" ></script>
</body>
</html>
