<?php
include '../res/php/main.php';
include '../res/php/manage.php';

$_SESSION['PatientScores'] = null;

check_loggedin("app.php");

if (isset($_GET['id'])) {
    getPatientById($con, $_GET['id']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lymph &mdash; App</title>
    <link rel="shortcut icon" href="../res/images/favicon.svg" type="image/x-icon">

    <!-- ----------------- Google Fonts ---------------- -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800;900&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- --------------- External CSS -------------- -->
    <link rel="stylesheet" href="../res/css/bootstrap.css">
    <link rel="stylesheet" href="../res/css/style.css">
    <link rel="stylesheet" href="../res/css/responsive.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="animte-in">

    <!-- ===================== Banner Part Start ================= -->
    <section id="visitModule">

        <!-- ===================== Inner Menu Start ================= -->
        <section id="menu">
            <div class="container menu">
                <nav class="navbar navbar-expand-lg">
                    <a class="navbar-brand d-flex align-items-center" href="#">
                        <img src="../res/images/logo.png" class="img-fluid logoImg" alt="logo">
                        <h1 class="logoText">Lymph</h1>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
                    </button>

                    <div class="collapse navbar-collapse no-login" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto ml-auto">
                            <li class="nav-item ">
                                <a class="nav-link mr-3 activee" href="../index.php">Home</a>
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
        <div class="banner container">
            <h1 class="visitModuleTitle text-center mt-4">Manage</h1>
            <h3 class="informationSubTitle text-center">Patient <?= $_SESSION['PatientData']['Surname'], ' ', $_SESSION['PatientData']['Name'] ?></h3>
            <div class="welcomeTable dashboard mt-5">
                <div class="DashboardController px-4 py-3">
                    <h5 class="dashTitle">Total Patient Score</h5>
                    <canvas id="myChart"></canvas>

                    <?php
                    if (isset($_SESSION['PatientScores'])) {

                        $date = "";
                        $score = "";

                        foreach($_SESSION['PatientScores'] as &$SingleScore)
                        {
                            $date = $date.", '".$SingleScore['Date']."'";
                            $score = $score.$SingleScore['Score'].",";
                        }

                        $date = substr($date, 1);
                        $score = substr($score, 0, -1);

                        echo "<script>
                        const labels = [$date];
                        const data = {
                            labels: labels,
                            datasets: [{
                                label: 'Score Line',
                                backgroundColor: '#fff',
                                borderColor: '#002',
                                data: [$score],
                            }]
                        };
                        </script>";
                    } else {
                        $scores = "".rand(0, 250);

                        for($i = 0; $i < 9; $i++)
                        {
                            $scores = $scores.", ".rand(0, 250);
                        }

                        echo "<script>
                        const labels = ['1w', '2w', '3w', '4w', '5w', '6w', '7w', '8w', '9w', '10w'];
                        const data = {
                            labels: labels,
                            datasets: [{
                                label: 'Score Line',
                                backgroundColor: '#fff',
                                borderColor: '#002',
                                data: [$scores],      
                            }]
                        };
                        </script>";
                    }
                    ?>
                </div>

                <div class="welcomeExBtn firstWcBtnRsc navArrow">
                    <button class="btn rightBtnCtrl"><i class="fas fa-arrow-left"></i></button>
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
    <script src="../res/js/dashboard.js"></script>
    <script src="../res/js/core.js"></script>

</body>

</html>