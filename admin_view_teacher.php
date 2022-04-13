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

$sql = "SELECT * FROM teacher";

$result = mysqli_query($data, $sql);

if ($data === false) {
    die("connection error");
}

if ($_GET['teacher_id']) {
    $t_id = $_GET['teacher_id'];

    $sql2 = "DELETE FROM teacher WHERE id = '$t_id'";

    $result2 = mysqli_query($data, $sql2);

    if ($result2) {
        echo "Delete Success";
        header('location:admin_view_teacher.php');
    } else {
        echo "X berjaya";
    }
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
    <title>View Teacher</title>

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

        <h1>Teacher Data</h1>

        <?php
        if ($_SESSION['message']) {
            echo $_SESSION['message'];
        }
        unset($_SESSION['message']);
        ?>

        <br><br>

        <table border="1px">
            <tr>
                <th class="table-th">Teacher Name</th>
                <th class="table-th">About Teacher</th>
                <th class="table-th">Image</th>
                <th class="table-th">Delete</th>
                <th class="table-th">Update</th>
            </tr>

            <?php
            while ($info = $result->fetch_assoc()) {
            ?>
                <tr>
                    <td class="table-td"><?php echo "{$info['name']}" ?></td>
                    <td class="table-td"><?php echo "{$info['description']}" ?></td>
                    <td class="table-td"><img src="<?php echo "{$info['image']}" ?>" height="100px" width="100px"> </td>
                    <td class="table-td"><?php echo "<a class='btn btn-danger' onClick=\" javascript:return confirm('Are Your to Delete this?'); \" href='admin_view_teacher.php?teacher_id={$info['id']}'>Delete</a>"; ?></td>
                    <td class="table-td"><?php echo "<a class='btn btn-primary' href='admin_update_teacher.php?teacher_id={$info['id']}'>Update</a>" ?></td>

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