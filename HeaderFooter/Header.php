<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <style>
        .navbar {
            background: rgba(255, 255, 255, 0.9);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-weight: bold;
            color: #007bff;
        }

        .navbar-toggler-icon {
            background-color: #007bff;
        }

        .navbar-toggler:hover {
            background-color: #0056b3;
        }

        .navbar-nav {
            margin-left: auto;
        }

        .nav-link {
            color: #333;
        }

        .nav-link:hover {
            color: #007bff;
        }

        .form-inline input,
        .form-inline button {
            border-color: #007bff;
            color: #007bff;
        }

        .form-inline input::placeholder {
            color: #007bff;
        }

        .form-inline button:hover {
            background-color: #0056b3;
            color: #fff;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Short Airbnb</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="nav-item active">
            <?php
                if(isset($_SESSION['username'])){
                echo '<a class="nav-link" href="../../index.php">Home <span class="sr-only">(current)</span></a>';
                }
             ?>   
            </li>
            <li class="nav-item">
                <?php
                if(isset($_SESSION['username'])){
                    echo '<a class="nav-link">Logged in as: ' . $_SESSION['username'] . '</a>';
                } else {
                    echo '<a class="nav-link" href="../Authentication/Login.php">Login</a>';
                }
                ?>
            </li>
            <li class="nav-item">
                <?php
                if(!isset($_SESSION['username'])){
                    echo '<a class="nav-link" href="../Authentication/Registration.php">Sign Up</a>';
                }
                ?>
            </li>
            <li class="nav-item">
                <?php
                if(isset($_SESSION['username'])){
                    echo '<a class="nav-link" href="http://localhost/airbnb/views/Authentication/logout.php">Logout</a>';
                }
                ?>
            </li>
            <li class="nav-item">
                <?php
                if(isset($_SESSION['username'])){
                    echo '<a class="nav-link" href="http://localhost/airbnb/views/rooms/createproperty.php">Rent Your Rooms</a>';
                }
                ?>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://localhost/airbnb/views/rooms/allrooms.php">See All Rooms</a>
            </li>
            <li class="nav-item">
                <?php
                if(isset($_SESSION['username'])){
                    echo '<a class="nav-link" href="http://localhost/airbnb/views/Booking/mybookings.php">My Bookings</a>';
                }
                ?>
            </li>
        </ul>
        <!-- <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form> -->
    </div>
</nav>

</body>
</html>
