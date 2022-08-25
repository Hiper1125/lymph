<?php
include '../res/php/main.php';

if (isset($_SESSION['Logged'])) {
    header('Location: dashboard.php');
    exit;
}

$_SESSION['Token'] = md5(uniqid(rand(), true));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lymph &mdash; Login</title>
    <link rel="shortcut icon" href="../res/images/favicon.svg" type="image/x-icon">

    <!-- ----------------- Google Fonts ---------------- -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800;900&display=swap"
        rel="stylesheet">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- --------------- External CSS -------------- -->
    <link rel="stylesheet" href="../res/css/bootstrap.css">
    <link rel="stylesheet" href="../res/css/style.css">
    <link rel="stylesheet" href="../res/css/responsive.css">

</head>

<body class="animte-in">

    <!-- ===================== Banner Part Start ================= -->
    <section id="banner">

        <!-- ===================== Inner Menu Start ================= -->
        <section id="menu">
            <div class="container menu">
                <nav class="navbar navbar-expand-lg">
                    <a class="navbar-brand d-flex align-items-center" href="#">
                        <img src="../res/images/logo.png" class="img-fluid logoImg" alt="logo">
                        <h1 class="logoText">Lymph</h1>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
                    </button>

                    <div class="collapse navbar-collapse no-login" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto ml-auto">
                            <li class="nav-item ">
                                <a class="nav-link mr-3" href="../index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mr-3" href="../about.php">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mr-3" href="../doctors.php">Doctors</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../book.php">Book</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </section>
        <!-- ===================== Inner Menu End ================= -->

        <!-- ===================== Banner Content Start ================= -->
        <div class="banner container d-flex align-items-center">
            <div class="bannerContent">
                <div class="row">
                    <form id="login" action="../res/php/auth.php" method="POST">
                        <div class="row">
                            <div class="col-sm-7 mt-md-5">
                                <h1 class="bannerTitle">Login</h1>
                                <div class="form-group">
                                    <input type="email" class="form-control inputHeightCtrl loginInput" id="email"
                                        placeholder="Email" name="email" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control inputHeightCtrl loginInput" id="password"
                                        placeholder="Password" name="password" required>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="token" value="<?= $_SESSION['Token'] ?>">
                                </div>
                                <button id="login"
                                    class="btn btn-lg text-light bannerBtn mt-md-4 loginButton">Login</button>
                            </div>
                            <div class="col-sm-5">
                                <img class="img-fluid immagine" src="../res/images/bannerImg.png" alt="bannerImg">
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <!-- ===================== Banner Content Start ================= -->
    </section>
    <!-- ===================== Banner Part End ================= -->

    <!-- JS FILES -->
    <script src="https://kit.fontawesome.com/5857fbd9b0.js" crossorigin="anonymous"></script>
    <script src="../res/js/jquery.slim.js"></script>
    <script src="../res/js/popper.min.js"></script>
    <script src="../res/js/bootstrap.min.js"></script>
    <script src="../res/js/app.js"></script>
    <script src="../res/js/core.js"></script>

</body>

</html>