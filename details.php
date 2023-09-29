<?php

include('config/db_connect.php');

if (isset($_POST['delete'])) {
    $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);
    //make sql
    $sql = "DELETE FROM pizzas WHERE id = $id_to_delete";

    //check to see if sql is correct
    if (mysqli_query($conn, $sql)) {
        header("location: pizza_list.php");
    } else {
        echo 'query error: ' . mysqli_error($conn);
    }
}

if (isset($_POST['update'])) {
    header("location: update_pizza.php");
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
            <div class="card  mt-3 mb-3 mx-auto" style="width: 25rem;">
                <div class="card-body mx-auto text-center ">
                    <h4><?php echo htmlspecialchars($pizza['title']) ?></h4>
                    <p>Created by <?php echo htmlspecialchars($_SESSION['firstName']) ?></p>
                    <p>Date:<?php echo date($pizza['created_At']) ?></p>
                    <p>Toppings:<?php echo htmlspecialchars($pizza['toppings']) ?></p>

                    <!-- Delete Form -->
                    <form action="details.php" method="post">
                        <input type="hidden" name="id_to_delete" value="<?php echo $_SESSION['pizza_id'] = $pizza['id'] ?>">
                        <input type="submit" name="delete" value="Delete" class="bg_primary w-20">
                    </form>
                    <!-- Update Form -->
                    <a type="submit" name="more-info" href="update_pizza.php?id=<?php echo $pizza['id'] ?>" value="more info" class="btn btn-primary w-25 mx-auto mt-2 mb-2">Update</a>
                </div>
            </div>
        </div>

    <?php else : ?>
        <h5>No such pizza exists</h5>
    <?php endif; ?>
</div>
<?php include('templates/footer.php') ?>

</html>