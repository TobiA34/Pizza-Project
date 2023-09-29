<?php
include('config/db_connect.php');
$username = $password = $email = $firstName = $firstName =  $lastName = $telephone = '';
$errors = array('username' => '', 'password' => '', 'email' => '', $firstName => '', $lastName => '', $telephone = '');

if (isset($_POST['add'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $telephone = $_POST['telephone'];
    $email = $_POST['email'];

    $regex = "";

    //check validation for email
    if (empty($email)) {
        $errors['email'] = 'An email is required <br />';
        print_r($errors['email']);
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format<br>";
            echo $emailErr;
        } else {
            echo "valid email<br>";
        }
    }

    //check validation for username
    if (empty($username)) {
        $errors['username'] = 'An Username is required <br />';
        print_r($errors['username']);
    } else {
        if (!preg_match('/^[A-Za-z][A-Za-z0-9]{5,31}$/', $username)) {
            echo $username . " is not valid.<br>";
        } else {
            echo $username . " is valid.<br>";
        }
    }

    //check validation for password
    if (empty($password)) {
        $errors['password'] = 'An password is required <br />';
        print_r($errors['password']);
    } else {
        if (!preg_match("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/", $password)) {
            echo $password . " is not valid. You need a special character<br>";
        } else {
            echo $password . " is valid. <br>";
        }
    }

    //check validation for firstName
    if (empty($firstName)) {
        $errors['firstName'] = 'An first name is required <br />';
        print_r($errors['firstName']);
    } else {
        if (preg_match('^[a-z0-9_-]{3,50}$', $firstName)) {
            echo $firstName . " is not valid.<br>";
        } else {
            echo $firstName . " is valid.<br>";
        }
    }
    //check validation for lastName
    if (empty($lastName)) {
        $errors['lastName'] = 'An last name is required <br />';
    } else {
        if (preg_match('^[a-z0-9_-]{3,50}$', $lastName)) {
            echo $lastName . " is not valid.<br>";
        } else {
            echo $lastName . " is valid.<br>";
        }
    }
    //check validation for telephone
    if (empty($telephone)) {
        $errors['telephone'] = 'An telephone is required <br />';
        print_r($errors['telephone']);
    } else {
        if (!preg_match("/^(\+44\s?7\d{3}|\(?07\d{3}\)?)\s?\d{3}\s?\d{3}$/", $telephone)) {
            echo $telephone . " is not valid.<br>";
        } else {
            echo $telephone . " is valid. <br>";

        }
    }

    //Insert into array
    if (array_filter($errors)) {
        //echo errors in form;
    } else {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $hashPassword = password_hash($password, PASSWORD_DEFAULT);
        $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
        $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
        $telephone = mysqli_real_escape_string($conn, $_POST['telephone']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);

        //create sql
        $sql = "INSERT INTO users(username,`password`,firstName,lastName,telephone,email) VALUES('$username', '$hashPassword', '$firstName', '$lastName', '$telephone', '$email')";

        //save to database and check
        if (mysqli_query($conn, $sql)) {
            //success
            header('location: index.php');

        } else {
            //failure
            echo 'query error:' . mysqli_errno($conn);
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

    <H1 class="text-center mt-5 mb-5">Register</H1>

    <div class="row">
        <div class="col-sm-6 mx-auto">
            <div class="card m-5 text-center rounded w-80 ">
                <div class="card-body">

                    <div class="form-group form-check">
                        <form action="register.php" method="post">

                            <label for="title">username</label>
                            <input type="text" name="username" class="form-control w-75 mx-auto" placeholder="Enter username">

                            <label for="exampleCheck1">Password</label>
                            <input type="password" name="password" class="form-control w-75 mx-auto" placeholder="Enter password">

                            <label for="exampleCheck1">Email</label>
                            <input type="email" name="email" class="form-control w-75 mx-auto" placeholder="Enter Email">

                            <label for="exampleCheck1">First name</label>
                            <input type="text" name="firstName" class="form-control w-75 mx-auto" placeholder="Enter First name">

                            <label for="exampleCheck1">last name</label>
                            <input type="text" name="lastName" class="form-control w-75 mx-auto" placeholder="Enter Last name">

                            <label for="exampleCheck1">telephone</label>
                            <input type="text" name="telephone" class="form-control w-75 mx-auto" placeholder="Enter telephone">

                            <!-- Add Button -->
                            <h4 class="card-title"></h4>
                            <input type="submit" name="add" value="register" class="btn btn-primary btn-lg mt-2 mb-2 mx-auto w-25">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('templates/footer.php'); ?>


</body>

</html>