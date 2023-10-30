<?php
include('config/db_connect.php');

session_start();

$title = $toppings = $image = '';
$errors = array('title' => '', 'toppings' => '', $image => '');

if (isset($_POST['add'])) {

    echo $_POST['title'];
    echo $_POST['toppings'];

    // header('location: pizza_list.php');

    // //check title 
    if (empty($_POST['title'])) {
        $errors['title'] = 'An title is required <br />';
    } else {
        $title = $_POST['title'];
        if (!preg_match('/^[a-zA-Z\s]+$/', $title)) {
            $errors['title'] = 'Title must be a letters and spaces only';
        }
    }

    // // //check toppings 
    if (empty($_POST['toppings'])) {
        $errors['toppings'] = 'At least one ingredient is required <br>';
    } else {
        $toppings = $_POST['toppings'];
        if (!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $toppings)) {
            $errors['toppings'] = 'At least one ingredient is required <br>';
        }
    }

    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $toppings = mysqli_real_escape_string($conn, $_POST['toppings']);
    $user_id = mysqli_real_escape_string($conn, $_SESSION['user_id']);
    //create sql
    $sql = "INSERT INTO pizzas(title,toppings,user_fk) VALUES('$title', '$toppings','$user_id')";

    //save to database and check
    if (mysqli_query($conn, $sql)) {
        //success
        header('location: pizza_list.php');
    } else {
        //failure
        echo 'query error:' . mysqli_errno($conn);
    }
}
?>


<!doctype html>
<html lang="en">
<?php include('templates/header.php'); ?>

<head>
    <!-- Required meta tags -->
    <title>Pizza</title>
</head>

<body>
    <H1 class="text-center mt-5 mb-5">Add Pizza</H1>
    <div class="row">
        <div class="col-sm-6 mx-auto">
            <div class="card m-5 text-center rounded w-80">
                <div class="card-body ">
                    <div class="form-group form-check">
                        <form action="pizza.php" method="post">

                            <!-- input forms -->

                            <h2 class="m-4" for="title">Pizza Title</h2>
                            <input type="text" name="title" class="form-control w-75 m-4 mx-auto" placeholder="Pizza">

                            <h2 class="toppings m-4" for="exampleCheck1">Toppings</h2>
                            <input type="text" name="toppings" class="form-control w-75 mx-auto" placeholder="toppings">
                            <!-- Add Button -->
                            <input type="submit" name="add" value="Add" class="btn btn-primary m-5 mb-2 mx-auto w-25 p-3">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('templates/footer.php'); ?>


</body>

</html>