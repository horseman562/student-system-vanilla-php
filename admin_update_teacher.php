<?php

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

$id = $_GET['teacher_id'];

if (isset($_GET['teacher_id'])) {


    $sql = "SELECT * FROM teacher WHERE id = '$id'";

    $result = mysqli_query($data, $sql);

    $info = $result->fetch_assoc();

    if (isset($_POST['update_teacher'])) {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $file = $_FILES['image']['name'];
        $dst = "./image/" . $file;
        $dst_db = "image/" . $file;
        move_uploaded_file($_FILES['image']['tmp_name'], $dst);

        if ($file) {
            $query = "UPDATE teacher SET name='$name', description='$description', image='$dst_db' WHERE id='$id'";
        } else {
            $query = "UPDATE teacher SET name='$name', description='$description' WHERE id='$id'";
        }




        $result2 = mysqli_query($data, $query);

        if ($result2) {
            header("location:admin_view_teacher.php");
        }
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
    <title>Update Student</title>

    <style type="text/css">
        label {
            display: inline-block;
            text-align: right;
            width: 150px;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .div_deg {
            background-color: skyblue;
            width: 600px;
            padding-top: 70px;
            padding-bottom: 70px;
        }
    </style>

</head>

<body>

    <?php include 'admin_sidebar.php' ?>

    <div class="content">

        <h1>Update Student</h1>

        <?php echo $id; ?>
        <center>
            <div class="div_deg">


                <form action="" method="POST" enctype="multipart/form-data">

                    <div>
                        <label>Teacher Name</label>
                        <input type="text" name="name" value="<?php echo "{$info['name']}"; ?>">
                    </div>

                    <div>
                        <label>About Teacher</label>
                        <!-- <input type="text" name="description" value="<?php echo "{$info['description']}"; ?>"> -->

                        <textarea name="description"><?php echo "{$info['description']}"; ?></textarea>
                    </div>

                    <div>
                        <label>Teacher Old Image</label>
                        <img width="100px" height="100px" src="<?php echo "{$info['image']}"; ?>" alt="">
                    </div>

                    <div>
                        <label>Teacher New Image</label>
                        <input type="file" name="image">
                    </div>

                    <div>
                        <button class="btn btn-primary" type="submit" name="update_teacher">Update</button>
                    </div>

                </form>
            </div>
        </center>


    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>