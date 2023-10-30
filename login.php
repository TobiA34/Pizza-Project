<?php

session_start();

$success = 0;
$invalid = 0;

include('config/db_connect.php');
// Define $myusername and $mypassword
$username = $_POST['username'];
$password = $_POST['password'];


// To protect MySQL injection (more detail about MySQL injection)
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysqli_real_escape_string($conn, $username);
$hash = password_hash($password, PASSWORD_DEFAULT);



$sql = "SELECT * FROM users where username='" . $username . "'";
$result = mysqli_query($conn, $sql);

if (isset($_POST['login'])) {

    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $hashedPassword = $row['password'];
            if (password_verify($password, $hashedPassword)) {
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['password'] = $row['password'];
                $_SESSION['firstName'] = $row['firstname'];
                $_SESSION['lastName'] = $row['lastname'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['telephone'] = $row['telephone'];
                $success = 1;
                header('location: pizza.php');
            } else {
                $invalid = 1;
            }
        }
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <title>Pizza</title>
</head>

<body>
    <?php include('templates/header.php'); ?>
    <div class="container">
        
    </div>
    <h1 class="text-center mt-5 mb-5" id="login">Login</h1>
    <div class="row">
        <div class="col-sm-6 mx-auto">
            <div class="card m-5 text-center rounded w-80 ">
                <div class="card-body">

                    <div class="form-group form-check">
                        <form action="login.php" method="post">

                            <!-- input forms -->

                            <label for="title">username</label>
                            <input type="text" name="username" class="form-control w-75 mx-auto" placeholder="Enter username">

                            <label>Password</label>
                            <input type="password" name="password" class="form-control w-75 mx-auto" placeholder="Enter password" id="password">

                            <label>Confirmed password</label>
                            <input type="password" name="password" class="form-control w-75 mx-auto" placeholder="Enter comfired password" id="password">

                            <input type="checkbox" onclick="myFunction()">Show Password

                            <?php if ($invalid) : ?>
                                <div class="alert alert-danger" role="alert">
                                    Wrong password
                                </div>
                            <?php endif ?>


                            <!-- Add Button -->
                            <h4 class="card-title"></h4>
                            <input type="submit" name="login" value="login" class="btn btn-primary btn-lg mt-2 mb-2 mx-auto w-25">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('templates/footer.php'); ?>


</body>

</html>