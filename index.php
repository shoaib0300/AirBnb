<?php

// session_start();

include_once 'HeaderFooter/Header.php';
require_once __DIR__ . '/vendor/autoload.php';
use App\Database\Database;
use App\Sessions\Session;
Session::sessionStart();

$instance = Database::getInstance();
$db = $instance->getConnection();

if (isset($_SESSION['user'])) {
    $id = $_SESSION['user'];
    $sql = "SELECT * FROM users WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $user = $stmt->fetch();
    $_SESSION['id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['email'] = $user['email'];
    $_SESSION['country'] = $user['country'];
    $_SESSION['phone'] = $user['phone'];
    echo $_SESSION['email'];
} else {
    header("Location: views/Authentication/Login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="shortcut icon" href="https://miro.medium.com/v2/resize:fill:112:112/g:fp:0.3:0.8/1*XIAC7ppnn_oyQBlZsSlowA.png" type="image/x-icon"/>
    <title>Duplicate Airbnb</title>
</head>
<body>
    <h2>Hello World </h2>
    <script src="assets/script.js" ></script>
</body>
</html>
