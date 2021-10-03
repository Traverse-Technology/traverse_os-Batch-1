<?php
include "ulti/helpers.php";
$categories = selectData($db,"categories");
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Hello, world!</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="index.php">Traverse OS</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home</a>
            </li>

            <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Product
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <?php
                    foreach ($categories as $category){
                        echo '<a class="dropdown-item" href="product.php?cat_id='.$category['id'].'">'.$category['name'].'</a>';
                    }
                    ?>

                </div>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="contact.php">Contact</a>
            </li>
            <?php
            session_start();
            if (!isset($_SESSION['userData']) && !isset($_COOKIE['userData'])) {
                ?>
                <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Member
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
                        <a class="dropdown-item" href="register.php">Register</a>
                        <a class="dropdown-item" href="login.php">Login</a>
                    </div>
                </li>
                <?php
            }
            ?>
            <?php
            if (isset($_SESSION['userData']) || isset($_COOKIE['userData'])) {
            ?>
            <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php
                    if(isset($_COOKIE['userData'])){
                        $userObject = json_decode($_COOKIE['userData']);
                        echo $userObject->name;
                    }else{
                        $userSession = $_SESSION['userData'];
                        echo $userSession['name'];
                    }
                    ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                    <?php
                    if (isset($_SESSION['userData'])){
                        if ($userSession['role'] == "customer"){
                            echo '<a class="dropdown-item" href="customer/profile/profile.php">Customer Dashboard</a>';
                        }else{
                            echo '<a class="dropdown-item" href="admin/dashboard/profile.php">Admin Dashboard</a>';
                        }
                    }else{
                        if ($userObject->role == "customer"){
                            echo '<a class="dropdown-item" href="customer/profile/profile.php">Customer Dashboard</a>';
                        }else{
                            echo '<a class="dropdown-item" href="admin/dashboard/profile.php">Admin Dashboard</a>';
                        }
                    }

                    ?>


                    <a class="dropdown-item" href="logout.php">Logout</a>
                </div>
            </li>
                <?php
            }
            ?>
            <li class="nav-item active">
                <a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart"> <span id="count" class="badge badge-light">0</span></i></a>
            </li>
        </ul>
        <form method="get" action="search-product.php" class="form-inline my-2 my-lg-0">
            <input name="keyword"  class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button name="btn_search" class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>
