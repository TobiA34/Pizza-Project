<?php

include('config/db_connect.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST['update'])) {
    $pizza_id = $_POST['pizzaID'];
    $title = $_POST['title'];
    $toppings = $_POST['toppings'];

    echo $title;

    //make sql
    $sql = "UPDATE pizzas SET title = '$title' , toppings = '$toppings' WHERE id = '$pizza_id'";

    // var_dump($sql);

    //check to see if sql is correct
    if (mysqli_query($conn, $sql)) {
        header("location: pizza_list.php?id=". $pizza_id);
    } else {
        echo 'query error: ' . mysqli_error($conn);
    }
}


//check Get request id param
if (isset($_GET['id'])) {

    $id = mysqli_real_escape_string($conn, $_GET['id']);

    //make sql
    $sql = "SELECT * FROM pizzas WHERE id = $id";

    // get the query result 
    $result = mysqli_query($conn, $sql);

    // fetch result in array format 
    $pizza = mysqli_fetch_assoc($result);

    //free from memory
    mysqli_free_result($result);

    //close connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include('templates/header.php') ?>
<div class="container">
    <?php if ($pizza) :  ?>
        <div class="container">
            <h1 class="text-center">Update pizza </h1>
            <h1 class="text-center"><?php echo $_SESSION['pizza_id']; ?> </h1>

            <div class="card  mt-3 mb-3 mx-auto" w-100>
                <div class="card-body mx-auto text-center ">
                    <form action="update_pizza.php" method="post" enctype="multipart/form-data">

                        <label>Pizza Title</label>
                        <input type="text" value="<?php echo htmlspecialchars($pizza['title']) ?>" name="title"><br>

                        <label>Pizza Toppings<br></label>
                        <input class=" w-70" type="text" value="<?php echo htmlspecialchars($pizza['toppings']) ?>" name="toppings"><br>
                        <input type="hidden" name="pizzaID" value="<?php echo $pizza['id'] ?>" />

                        <br>
                        <input type="submit" name="update" value="update" class="bg_primary w-20">
                    </form>
                </div>
            </div>
        </div>

    <?php else : ?>
        <h5>No such pizza exists</h5>
    <?php endif; ?>
</div>
<?php include('templates/footer.php') ?>

</html>