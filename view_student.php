<?php

error_reporting(0);
session_start();

if (!isset($_SESSION['username'])) {
    header("location:login.php");
} elseif ($_SESSION['usertype'] == 'student') {
    header("location:login.php");
}

$host = "localhost";

$user = "root";

$password = "";

$db = "student-system";


$data = mysqli_connect($host, $user, $password, $db);

$sql = "SELECT * FROM user WHERE usertype = 'student'";

$result = mysqli_query($data, $sql);


if ($data === false) {
    die("connection error");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="admin.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Admin Dashboard</title>

    <style type="text/css">
        .table-th {
            padding: 20px;
            font-size: 20px;
        }

        .table-td {
            padding: 20px;
            background-color: skyblue;
        }
    </style>

</head>

<body>

    <?php include 'admin_sidebar.php' ?>

    <div class="content">

        <h1>Student Data</h1>

        <?php
        if ($_SESSION['message']) {
            echo $_SESSION['message'];
        }
        unset($_SESSION['message']);
        ?>

        <br><br>

        <table border="1px">
            <tr>
                <th class="table-th">UserName</th>
                <th class="table-th">Email</th>
                <th class="table-th">Phone</th>
                <th class="table-th">Password</th>
                <th class="table-th">Delete</th>
                <th class="table-th">Update</th>
            </tr>

            <?php
            while ($info = $result->fetch_assoc()) {
            ?>
                <tr>
                    <td class="table-td"><?php echo "{$info['username']}" ?></td>
                    <td class="table-td"><?php echo "{$info['email']}" ?></td>
                    <td class="table-td"><?php echo "{$info['phone']}" ?></td>
                    <td class="table-td"><?php echo "{$info['password']}" ?></td>
                    <td class="table-td"><?php echo "<a class='btn btn-danger' onClick=\" javascript:return confirm('Are Your to Delete this?'); \" href='delete.php?student_id={$info['id']}'>Delete</a>"; ?></td>
                    <td class="table-td"><?php echo "<a class='btn btn-primary' href='update_student.php?student_id={$info['id']}'>Update</a>" ?></td>

                </tr>

            <?php } ?>
        </table>


    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>