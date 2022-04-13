<?php
error_reporting(0);
session_start();
session_destroy();

if ($_SESSION['message']) {
    $message = $_SESSION['message'];

    echo "<script type='text/javascript'>

        alert('$message');

        </script>";
}

$host = "localhost";

$user = "root";

$password = "";

$db = "student-system";


$data = mysqli_connect($host, $user, $password, $db);

$sql = "SELECT * FROM teacher";

$result = mysqli_query($data, $sql);

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">



    <title>Hello, world!</title>
</head>

<body>
    <nav>
        <label class="logo">W-School</label>

        <ul>
            <li><a href="">Home</a></li>
            <li><a href="">Contact</a></li>
            <li><a href="">Admission</a></li>
            <li><a href="login.php" class="btn btn-success">Login</a></li>
        </ul>
    </nav>


    <div class="section1">

        <label class="img_text">We Teach Students With Care</label>
        <img class="main_img" src="school_management.jpg">
    </div>


    <div class="container">

        <div class="row">

            <div class="col-md-4">

                <img class="welcome_img" src="school2.jpg">

            </div>

            <div class="col-md-8">

                <h1>Welcome to W-School</h1>

                <p>MEMS has been committed to global learning long before it became an indispensable feature of contemporary education. Established in 1997, we proudly stand as the 1st English medium school in Bangladesh to adopt both Pearson Edexcel and Cambridge curriculum (in O and A levels), drawing together students in a vibrant, academically challenging, and encouraging environment where manifold viewpoints are prized and celebrated.MEMS has been committed to global learning long before it became an indispensable feature of contemporary education. Established in 1997, we proudly stand as the 1st English medium school in Bangladesh to adopt both Pearson Edexcel and Cambridge curriculum (in O and A levels), drawing together students in a vibrant, academically challenging, and encouraging environment where manifold viewpoints are prized and celebrated.</p>

            </div>


        </div>


    </div>


    <center>
        <h1>Our Teachers</h1>
    </center>


    <div class="container">

        <div class="row">

            <?php

            while ($info = $result->fetch_assoc()) {

            ?>

                <div class="col-md-4">

                    <img class="teacher" src="<?php echo "{$info['image']}"; ?>">

                    <h3><?php echo "{$info['name']}"; ?></h3>
                    <h5><?php echo "{$info['description']}"; ?></h5>

                </div>

            <?php

            }

            ?>


        </div>


    </div>






    <center>
        <h1>Our Courses</h1>
    </center>


    <div class="container">

        <div class="row">

            <div class="col-md-4">

                <img class="teacher" src="web.jpg">
                <h3>Web Development</h3>


            </div>

            <div class="col-md-4">

                <img class="teacher" src="graphic.jpg">
                <h3>Graphics Design</h3>

            </div>

            <div class="col-md-4">

                <img class="teacher" src="marketing.png">
                <h3>Marketing</h3>

            </div>


        </div>


    </div>


    <center>
        <h1 class="adm">Admission Form</h1>

    </center>


    <div align="center" class="admission_form">

        <form action="data_check.php" method="POST">

            <div class="adm_int">
                <label class="label_text">Name</label>
                <input class="input_deg" type="text" name="name">
            </div>

            <div class="adm_int">
                <label class="label_text">Email</label>
                <input class="input_deg" type="text" name="email">
            </div>

            <div class="adm_int">
                <label class="label_text">Phone</label>
                <input class="input_deg" type="text" name="phone">
            </div>
            <div class="adm_int">
                <label class="label_text">Message</label>
                <textarea class="input_txt" name="message"></textarea>
            </div>

            <div class="adm_int">

                <input class="btn btn-primary" id="submit" type="submit" value="apply" name="apply">
            </div>


        </form>

    </div>


    <footer class="mt-3">
        <h3 class="footer_text">All @copyright reserved by web tech knowledge</h3>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>