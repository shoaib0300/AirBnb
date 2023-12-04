<?php 
    use App\Users\UserProfile;
    require_once __DIR__ . '/../../vendor/autoload.php';
    include_once '../../HeaderFooter/Header.php';

    if(isset($_GET['id'])){
        $user = $_GET['id'];
        $getUser = new UserProfile();
        $ouput = $getUser->getUserData($user);
        if (!empty($ouput)) {
            $user_name = $ouput['username'];
            $user_email = $ouput['email'];
            $user_password = $ouput['password'];
            $user_country = $ouput['country'];
            $user_phone = $ouput['phone'];
        }
    }
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if (isset($_POST['submit'])) {
            $id = $_POST['user_id'];
            $data = [
                'username' => $_POST['name'],
                'email' => $_POST['email'],
                'password' => $_POST['password'],
                'confirm-password' => $_POST['confirm-password'],
                'country' => $_POST['country'],
                'phone' => $_POST['phone'],
                'user_id' => $_POST['user_id'],
            ];
            $update = new UserProfile();
            $update->userUpdate($data);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h2 id="Users">User Details</h2>
        <form action="" type="submit" method="post">
            <input type="hidden" class="form-control" name="user_id" id="userid" value="<?= $user_id?>" require><br>
            <label for="name">Name: </label>
            <input type="text" class="form-control" name="name" id="username" value="<?= $user_name?>" require><br>
            <label for="email">Email: </label>
            <input type="text" class="form-control" name="email" id="useremail" value="<?= $user_email?>"required><br>
            <label for="password">New Password: </label>
            <input type="text" class="form-control" name="password" id="password" value="<?= $user_password?>" required><br>
            <label for="confirm-password">New Confirm Password: </label>
            <input type="text" class="form-control" name="confirm-password" id="confirm-password" value="<?= $user_password?>" required><br>
            <label for="country">Country: </label>
            <input type="text" class="form-control" name="country" id="country" value="<?= $user_country?>" required><br>
            <label for="phone">Phone Number: </label>
            <input type="phone" class="form-control" name="phone" id="phone" value="<?= $user_phone?>" required><br>
            <input type="submit" class="btn btn-primary" name="submit" value="Submit">
            <a href="index.php" class="btn btn-default">Back</a>
        </form>
    </div>    
</body>
</html>