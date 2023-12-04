<?php
use App\Users\UserProfile;
require_once __DIR__ . '/../../vendor/autoload.php';
include_once '../../HeaderFooter/Header.php';

$user = new UserProfile();
$userData = $user->getUserData($_SESSION['user']);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 id="my-rooms">My Profile</h2>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <p>User ID: <?= $userData['id']; ?></p>
                        <p>Name: <?= $userData['username']; ?></p>
                        <p>Email: <?= $userData['email']; ?></p>
                        <p>Country: <?= $userData['country']; ?></p>
                        <p>Phone: <?= $userData['phone']; ?></p>
                        <a href="user-edit.php?id=<?= $userData['id']; ?>" class="btn btn-primary">Edit</a>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>