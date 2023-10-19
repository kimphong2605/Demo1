<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link rel="stylesheet" href="https://getbootstrap.com/docs/5.2/components/card/">
    <link rel="stylesheet" href="style.css">
    <title>ATN Store</title>
</head>
<body>

    <nav class="navbar navbar-expand-sm navbar-dark bg-black">
        <div class="container-fluid">
            <a href="home.php">
                <img src="" width="50px" title="">
            </a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navsup">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navsup">
                <!--left-->
                <div class="navbar-nav">
                    <a href="home.php" class="nav-link">Home</a>
                    <a href="allproduct.php" class="nav-link">Product</a>
                    <a href="search.php" class="nav-link">Search</a>
                </div>
                <!--right-->
                <div class="navbar-nav ms-auto">
                    <?php
                    session_start();
                    if(isset($_SESSION['user_name'])):
                    ?>
                    <a href="login.php" class="nav-link">Welcom,<?=$_SESSION['user_name']?></a>
                    <a href="logout.php" class="nav-link">Logout</a>
                    <?php
                    else:
                    ?>
                    <a href="Register.php" class="nav-link">Register</a>
                    <a href="Login.php" class="nav-link">Login</a>
                    <?php
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </nav>
    <!--section class="py-5 text-center container"
        style="background-image: url('');height: 600px;">
        <div class="row py-ly-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">PQM Store</h1>
                <p class="lead colorred">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                    dolo
                    in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
                    occaecat
                    cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
            </div>
        </div>
    </!--section-->
    <div class="b-example-divider"></div>