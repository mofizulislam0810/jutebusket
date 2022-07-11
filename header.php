<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <!-- fontaweseme link -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
    <!-- custom css link -->
    <link rel="stylesheet" href="css/style.css" />
    <title>JUTE BASKET</title>
</head>

<body>
    <!-- header part -->
    <header>
        <!-- nav bar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand ms-2 text-white fw-bold" href="index.php">JUTE BASKET</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto me-5 mb-2 mb-lg-0 text-center">
                        <li class="nav-item">
                            <a class="nav-link text-white" aria-current="page" href="index.php">Home</a>
                        </li>
                        <?php if(isset($_SESSION['user_name'])){?>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="cart.php"><i class="fas fa-cart-arrow-down"></i><span
                                    id="cart-item" class="badge bg-danger"></span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="dashboard.php">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#"><?php echo $_SESSION['user_name'];?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="logout.php">Logout</a>
                        </li>

                        <?php } else { ?>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#"><i class="fas fa-cart-arrow-down"></i><span
                                    class="badge badge-danger"></span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white me-2" href="login.php">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white me-2" href="register.php">Sign up!</a>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>